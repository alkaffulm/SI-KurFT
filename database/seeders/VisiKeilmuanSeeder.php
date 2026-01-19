<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisiKeilmuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visi_keilmuan')->insert([
            // [
            //     // teknik sipil
            //     'id_ps' => 1,
            //     'id_kurikulum' => 1,
            //     'desc_vk_id' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // [
            //     // tambang
            //     'id_ps' => 2,
            //     'id_kurikulum' => 2,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik pertambangan yang kompeten dalam eksplorasi dan eksploitasi sumber daya mineral secara efisien, aman, dan berwawasan lingkungan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // [
            //     // mesin
            //     'id_ps' => 3,
            //     'id_kurikulum' => 3,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik mesin yang kompeten dalam merancang, mengembangkan, dan memelihara sistem mekanik serta teknologi manufaktur yang inovatif dan berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // [
            //     // lingkungan
            //     'id_ps' => 4,
            //     'id_kurikulum' => 4,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik lingkungan yang kompeten dalam merancang, mengelola, dan menerapkan solusi teknologi untuk menjaga kelestarian lingkungan dan sumber daya alam.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // [
            //     // arsitektur
            //     'id_ps' => 5,
            //     'id_kurikulum' => 5,
            //     'desc_vk_id' => 'Menghasilkan sarjana arsitektur yang kompeten dalam merancang bangunan dan lingkungan binaan yang estetis, fungsional, serta berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // [
            //     // kimia
            //     'id_ps' => 6,
            //     'id_kurikulum' => 6,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik kimia yang kompeten dalam merancang, mengoperasikan, dan mengelola proses industri kimia dengan memperhatikan aspek keselamatan, efisiensi, dan keberlanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            [
                // TI
                'id_ps' => 7,
                'id_kurikulum' => 7,
                'desc_vk_id' => 'Mengembangkan keilmuan Teknologi Informasi yang unggul dan berdaya saing nasional dalam pengembangan sistem, data, dan infrastruktur digital untuk mendukung pengambilan keputusan berbasis data serta keberlanjutan lingkungan lahan basah.',
                'desc_vk_en' => 'Developing superior and nationally competitive Information Technology science in the development of digital systems, data, and infrastructure to support data-based decision-making and the sustainability of wetland environments.',
            ],
            // [
            //     // elektro
            //     'id_ps' => 8,
            //     'id_kurikulum' => 8,
            //     'desc_vk_id' => 'Menghasilkan sarjana rekayasa elektro yang kompeten dalam merancang, mengembangkan, dan mengelola sistem kelistrikan serta teknologi elektronika yang inovatif dan berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // [
            //     // geologi
            //     'id_ps' => 9,
            //     'id_kurikulum' => 9,
            //     'desc_vk_id' => 'Menghasilkan sarjana rekayasa geologi yang kompeten dalam menerapkan prinsip-prinsip geologi untuk eksplorasi dan pengelolaan sumber daya alam secara berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],

            // kurikulum 2025
            // teknik sipil
            // [
            //     'id_ps' => 1,
            //     'id_kurikulum' => 10,
            //     'desc_vk_id' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // // tambang
            // [
            //     'id_ps' => 2,
            //     'id_kurikulum' => 11,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik pertambangan yang kompeten dalam eksplorasi dan eksploitasi sumber daya mineral secara efisien, aman, dan berwawasan lingkungan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // // mesin
            // [
            //     'id_ps' => 3,
            //     'id_kurikulum' => 12,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik mesin yang kompeten dalam merancang, mengembangkan, dan memelihara sistem mekanik serta teknologi manufaktur yang inovatif dan berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // // lingkungan
            // [
            //     'id_ps' => 4,
            //     'id_kurikulum' => 13,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik lingkungan yang kompeten dalam merancang, mengelola, dan menerapkan solusi teknologi untuk menjaga kelestarian lingkungan dan sumber daya alam.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // // arsitektur
            // [
            //     'id_ps' => 5,
            //     'id_kurikulum' => 14,
            //     'desc_vk_id' => 'Menghasilkan sarjana arsitektur yang kompeten dalam merancang bangunan dan lingkungan binaan yang estetis, fungsional, serta berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // // kimia
            // [
            //     'id_ps' => 6,
            //     'id_kurikulum' => 15,
            //     'desc_vk_id' => 'Menghasilkan sarjana teknik kimia yang kompeten dalam merancang, mengoperasikan, dan mengelola proses industri kimia dengan memperhatikan aspek keselamatan, efisiensi, dan keberlanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus     , fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // TI
            // [
            //     'id_ps' => 7,
            //     'id_kurikulum' => 16,
            //     'desc_vk_id' => 'Mengembangkan keilmuan Teknologi Informasi yang unggul dan berdaya saing nasional dalam pengembangan sistem, data, dan infrastruktur digital untuk mendukung pengambilan keputusan berbasis data serta keberlanjutan lingkungan lahan basah.',
            //     'desc_vk_en' => 'Developing superior and nationally competitive Information Technology science in the development of digital systems, data, and infrastructure to support data-based decision-making and the sustainability of wetland environments.',
            // ],
            // // elektro
            // [
            //     'id_ps' => 8,
            //     'id_kurikulum' => 17,
            //     'desc_vk_id' => 'Menghasilkan sarjana rekayasa elektro yang kompeten dalam merancang, mengembangkan, dan mengelola sistem kelistrikan serta teknologi elektronika yang inovatif dan berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
            // // geologi
            // [
            //     'id_ps' => 9,
            //     'id_kurikulum' => 18,
            //     'desc_vk_id' => 'Menghasilkan sarjana rekayasa geologi yang kompeten dalam menerapkan prinsip-prinsip geologi untuk eksplorasi dan pengelolaan sumber daya alam secara berkelanjutan.',
            //     'desc_vk_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit ipsum, vestibulum sit amet commodo cursus, fermentum ut sapien. Vestibulum mattis semper malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis ante, sed egestas elit. Nam a porttitor augue, nec pulvinar est. Curabitur vehicula pretium ipsum et laoreet.',
            // ],
        ]);
    }
}
