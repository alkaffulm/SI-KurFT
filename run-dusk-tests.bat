@echo off
REM Script Helper untuk menjalankan Laravel Dusk Test di Windows
REM Letakkan di root project dengan nama: run-dusk-tests.bat
REM Jalankan: run-dusk-tests.bat [option]

setlocal enabledelayedexpansion

REM Color codes (limited in Windows CMD)
REM Menggunakan simple markers untuk output

if "%1"=="" goto show_help
if "%1"=="help" goto show_help
if "%1"=="/?" goto show_help
if "%1"=="--help" goto show_help

if "%1"=="all" goto run_all
if "%1"=="add" goto run_add
if "%1"=="edit" goto run_edit
if "%1"=="delete" goto run_delete
if "%1"=="add:filter" goto run_add_filter
if "%1"=="edit:filter" goto run_edit_filter
if "%1"=="delete:filter" goto run_delete_filter
if "%1"=="verbose" goto run_verbose
if "%1"=="screenshot" goto run_screenshot
if "%1"=="install" goto install_dusk

echo [ERROR] Unknown option: %1
echo.
goto show_help

:show_help
echo.
echo =======================================
echo Laravel Dusk Test Runner - PEO Management
echo =======================================
echo.
echo Usage: run-dusk-tests.bat [option]
echo.
echo Options:
echo   all               Run all PEO tests
echo   add               Run PEO CREATE tests only
echo   edit              Run PEO EDIT tests only
echo   delete            Run PEO DELETE tests only
echo   add:filter        Run specific CREATE test
echo   edit:filter       Run specific EDIT test
echo   delete:filter     Run specific DELETE test
echo   verbose           Run all tests verbose
echo   screenshot        Run tests with screenshot on failure
echo   install           Install Dusk (one-time)
echo   help              Show this help
echo.
echo Examples:
echo   run-dusk-tests.bat all
echo   run-dusk-tests.bat add
echo   run-dusk-tests.bat edit
echo   run-dusk-tests.bat delete
echo   run-dusk-tests.bat add:filter test_peo_created_successfully_with_valid_data
echo.
goto end

:install_dusk
echo.
echo [INFO] Installing Laravel Dusk...
php artisan dusk:install
echo [SUCCESS] Dusk installation complete
goto end

:run_all
echo.
echo [INFO] Running All PEO Tests...
php artisan dusk tests/Browser/AddPEOTest.php tests/Browser/EditPEOTest.php tests/Browser/DeletePEOTest.php
goto end

:run_add
echo.
echo [INFO] Running PEO CREATE Tests...
php artisan dusk tests/Browser/AddPEOTest.php
goto end

:run_edit
echo.
echo [INFO] Running PEO EDIT Tests...
php artisan dusk tests/Browser/EditPEOTest.php
goto end

:run_delete
echo.
echo [INFO] Running PEO DELETE Tests...
php artisan dusk tests/Browser/DeletePEOTest.php
goto end

:run_verbose
echo.
echo [INFO] Running All Tests (Verbose Mode)...
php artisan dusk tests/Browser/AddPEOTest.php tests/Browser/EditPEOTest.php tests/Browser/DeletePEOTest.php --verbose
goto end

:run_screenshot
echo.
echo [INFO] Running All Tests (Screenshot on Failure)...
php artisan dusk tests/Browser/AddPEOTest.php tests/Browser/EditPEOTest.php tests/Browser/DeletePEOTest.php --screenshots-on-failure
goto end

:run_add_filter
if "%2"=="" (
    echo.
    echo [ERROR] Test name required
    echo.
    echo Available CREATE tests:
    echo   - test_form_validation_kode_peo_required
    echo   - test_form_validation_desc_peo_id_required
    echo   - test_form_validation_desc_peo_en_required
    echo   - test_peo_data_saved_to_database
    echo   - test_peo_created_successfully_with_valid_data
    echo.
    goto end
)
echo.
echo [INFO] Running CREATE Test: %2%
php artisan dusk tests/Browser/AddPEOTest.php --filter=%2%
goto end

:run_edit_filter
if "%2"=="" (
    echo.
    echo [ERROR] Test name required
    echo.
    echo Available EDIT tests:
    echo   - test_edit_form_displays_existing_peo_data
    echo   - test_peo_data_updated_successfully
    echo   - test_edit_form_validation_kode_peo_required
    echo   - test_edit_form_validation_desc_peo_id_required
    echo   - test_multiple_peo_updated_simultaneously
    echo.
    goto end
)
echo.
echo [INFO] Running EDIT Test: %2%
php artisan dusk tests/Browser/EditPEOTest.php --filter=%2%
goto end

:run_delete_filter
if "%2"=="" (
    echo.
    echo [ERROR] Test name required
    echo.
    echo Available DELETE tests:
    echo   - test_peo_deleted_successfully
    echo   - test_multiple_peo_deleted_simultaneously
    echo   - test_delete_checkbox_can_be_unchecked
    echo   - test_edit_and_delete_simultaneously
    echo.
    goto end
)
echo.
echo [INFO] Running DELETE Test: %2%
php artisan dusk tests/Browser/DeletePEOTest.php --filter=%2%
goto end

:end
echo.
echo [SUCCESS] Done!

