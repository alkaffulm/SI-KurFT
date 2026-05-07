<?php

namespace App\Exports;

use App\Models\Kelas;
use App\Models\RencanaAsesmenModel;
use App\Models\RencanaAsesmenCPMKBobotModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Events\AfterSheet;

class PenilaianTemplateExport implements
    FromArray,
    WithStyles,
    ShouldAutoSize,
    WithEvents
{
    protected $idKelas;
    protected $mergeCells = [];
    protected $helperColumns = [];

    public function __construct($idKelas)
    {
        $this->idKelas = $idKelas;
    }

    public function array(): array
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($this->idKelas);

        $rencanaAsesmen = RencanaAsesmenModel::where('id_mk', $kelas->id_mk)
            ->orderByRaw("
                CASE 
                    WHEN tipe_komponen = 'tugas' THEN 1
                    WHEN tipe_komponen = 'uts' THEN 2
                    WHEN tipe_komponen = 'uas' THEN 3
                    ELSE 4
                END
            ")
            ->orderBy('nomor_komponen')
            ->get();

        $bobot = RencanaAsesmenCPMKBobotModel::with('mkCpmkMap.cpmk')
            ->whereIn('id_rencana_asesmen', $rencanaAsesmen->pluck('id_rencana_asesmen'))
            ->get();

        $header1 = ['NIM', 'Nama'];
        $header2 = ['', ''];

        $currentCol = 3;

        $groupedByTipe = $rencanaAsesmen->groupBy('tipe_komponen');

        foreach ($groupedByTipe as $tipe => $asesmenList) {

            $helperStart = $currentCol;

            foreach ($asesmenList as $ra) {

                $cpmkForAsesmen = $bobot
                    ->where('id_rencana_asesmen', $ra->id_rencana_asesmen);

                $totalBobotAsesmen = $cpmkForAsesmen->sum('bobot');

                $cpmkGrouped = $cpmkForAsesmen
                    ->groupBy(fn($item) =>
                        $item->mkCpmkMap?->cpmk?->nama_kode_cpmk
                    );

                $startCol = $currentCol;

                foreach ($cpmkGrouped as $namaKode => $group) {

                    $bobotCpmk = $group->sum('bobot');

                    $maksNilaiInput = $totalBobotAsesmen > 0
                        ? round(($bobotCpmk / $totalBobotAsesmen) * 100, 1)
                        : 0;

                    $idCpmk = $group->first()->mkCpmkMap?->id_cpmk;

                    $header1[] = strtoupper(
                        $ra->nama_komponen ??
                        ($ra->tipe_komponen . ' ' . $ra->nomor_komponen)
                    );

                    $header2[] = $namaKode . ' (Maks: ' . $maksNilaiInput . ')';

                    $currentCol++;
                }

                $endCol = $currentCol - 1;

                if ($startCol < $endCol) {
                    $this->mergeCells[] =
                        $this->columnLetter($startCol) . '1:' .
                        $this->columnLetter($endCol) . '1';
                }
            }

            $helperCol = $currentCol;

            $header1[] = 'HELPER ' . strtoupper($tipe);
            $header2[] = '%';

            $this->helperColumns[] = [
                'col' => $helperCol,
                'start' => $helperStart,
                'end' => $helperCol - 1,
            ];

            $currentCol++;
        }

        $rows = [];

        $rows[] = $header1;
        $rows[] = $header2;

        $startDataRow = 3;

        foreach ($kelas->mahasiswa as $index => $mhs) {

            $excelRow = $startDataRow + $index;

            $row = [
                "'" . $mhs->nim,
                $mhs->nama_lengkap
            ];

            for ($i = 3; $i <= count($header2); $i++) {

                $isHelper = false;

                foreach ($this->helperColumns as $helper) {

                    if ($helper['col'] == $i) {

                        $startLetter = $this->columnLetter($helper['start']);
                        $endLetter = $this->columnLetter($helper['end']);

                    $maxTotal = 0;

                    for ($c = $helper['start']; $c <= $helper['end']; $c++) {

                        $headerText = $header2[$c - 1];

                        preg_match('/Maks:\s*([\d\.]+)/', $headerText, $match);

                        $maxTotal += isset($match[1]) ? (float)$match[1] : 0;
                    }

                    $formula =
                        '=IF(COUNTA(' .
                        "$startLetter$excelRow:$endLetter$excelRow" .
                        ')=0,"",ROUND((' .
                        "SUM($startLetter$excelRow:$endLetter$excelRow)" .
                        '/' .
                        $maxTotal .
                        ')*100,1))';

                        $row[] = $formula;

                        $isHelper = true;
                        break;
                    }
                }

                if (!$isHelper) {
                    $row[] = '';
                }
            }

            $rows[] = $row;
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 12,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '264450'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ]
            ],

            2 => [
                'font' => [
                    'bold' => true,
                    'size' => 11,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ]
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $sheet = $event->sheet;

                $sheet->mergeCells('A1:A2');
                $sheet->mergeCells('B1:B2');

                foreach ($this->mergeCells as $merge) {
                    $sheet->mergeCells($merge);
                }

                $sheet->freezePane('A3');

                $highestCol = $sheet->getHighestColumn();
                $highestRow = $sheet->getHighestRow();

                $sheet->getStyle("A1:$highestCol$highestRow")
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    );

                $sheet->getStyle("A1:$highestCol$highestRow")
                    ->getAlignment()
                    ->setVertical(Alignment::VERTICAL_CENTER);

                $sheet->getStyle("A4:A$highestRow")
                    ->getNumberFormat()
                    ->setFormatCode('@');

                $sheet->getColumnDimension('A')->setWidth(18);
                $sheet->getColumnDimension('B')->setWidth(35);

                foreach ($this->helperColumns as $helper) {

                    $letter = $this->columnLetter($helper['col']);

                    $sheet->getStyle($letter . '1:' . $letter . $highestRow)
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setRGB('FFF7D6');

                    $sheet->getStyle($letter . '1:' . $letter . $highestRow)
                        ->getFont()
                        ->getColor()
                        ->setRGB('000000');
                }
            }
        ];
    }

    private function columnLetter($c)
    {
        $letter = '';

        while ($c > 0) {
            $temp = ($c - 1) % 26;
            $letter = chr($temp + 65) . $letter;
            $c = (int)(($c - $temp - 1) / 26);
        }

        return $letter;
    }
}