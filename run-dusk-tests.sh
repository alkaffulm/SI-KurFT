#!/bin/bash

# Script Helper untuk menjalankan Laravel Dusk Test
# Letakkan di root project dengan nama: run-dusk-tests.sh
# Jalankan: bash run-dusk-tests.sh [option]

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Helper functions
print_header() {
    echo -e "${BLUE}========================================${NC}"
    echo -e "${BLUE}$1${NC}"
    echo -e "${BLUE}========================================${NC}"
}

print_success() {
    echo -e "${GREEN}✓ $1${NC}"
}

print_error() {
    echo -e "${RED}✗ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}ℹ $1${NC}"
}

# Show help
show_help() {
    cat << EOF
${BLUE}Laravel Dusk Test Runner - PEO Management${NC}

Usage: bash run-dusk-tests.sh [option]

Options:
    all             Run all PEO tests (create, edit, delete)
    add             Run PEO CREATE tests
    edit            Run PEO EDIT tests
    delete          Run PEO DELETE tests
    add:filter      Run specific CREATE test with filter
    edit:filter     Run specific EDIT test with filter
    delete:filter   Run specific DELETE test with filter
    verbose         Run all tests with verbose output
    screenshot      Run all tests with screenshot on failure
    install         Install Dusk (one-time setup)
    help            Show this help message

Examples:
    bash run-dusk-tests.sh all
    bash run-dusk-tests.sh add
    bash run-dusk-tests.sh edit
    bash run-dusk-tests.sh delete
    bash run-dusk-tests.sh add:filter test_peo_created_successfully_with_valid_data
    bash run-dusk-tests.sh verbose

${NC}
EOF
}

# Install Dusk
install_dusk() {
    print_header "Installing Laravel Dusk"
    php artisan dusk:install
    print_success "Dusk installation complete"
}

# Run all tests
run_all_tests() {
    print_header "Running All PEO Tests"
    php artisan dusk tests/Browser/AddPEOTest.php tests/Browser/EditPEOTest.php tests/Browser/DeletePEOTest.php
}

# Run CREATE tests
run_add_tests() {
    print_header "Running PEO CREATE Tests"
    php artisan dusk tests/Browser/AddPEOTest.php
}

# Run EDIT tests
run_edit_tests() {
    print_header "Running PEO EDIT Tests"
    php artisan dusk tests/Browser/EditPEOTest.php
}

# Run DELETE tests
run_delete_tests() {
    print_header "Running PEO DELETE Tests"
    php artisan dusk tests/Browser/DeletePEOTest.php
}

# Run specific CREATE test
run_add_filter() {
    local test_name=$1
    if [ -z "$test_name" ]; then
        print_error "Test name required"
        echo "Available CREATE tests:"
        echo "  - test_form_validation_kode_peo_required"
        echo "  - test_form_validation_desc_peo_id_required"
        echo "  - test_form_validation_desc_peo_en_required"
        echo "  - test_peo_data_saved_to_database"
        echo "  - test_peo_created_successfully_with_valid_data"
        return 1
    fi
    
    print_header "Running CREATE Test: $test_name"
    php artisan dusk tests/Browser/AddPEOTest.php --filter=$test_name
}

# Run specific EDIT test
run_edit_filter() {
    local test_name=$1
    if [ -z "$test_name" ]; then
        print_error "Test name required"
        echo "Available EDIT tests:"
        echo "  - test_edit_form_displays_existing_peo_data"
        echo "  - test_peo_data_updated_successfully"
        echo "  - test_edit_form_validation_kode_peo_required"
        echo "  - test_edit_form_validation_desc_peo_id_required"
        echo "  - test_multiple_peo_updated_simultaneously"
        return 1
    fi
    
    print_header "Running EDIT Test: $test_name"
    php artisan dusk tests/Browser/EditPEOTest.php --filter=$test_name
}

# Run specific DELETE test
run_delete_filter() {
    local test_name=$1
    if [ -z "$test_name" ]; then
        print_error "Test name required"
        echo "Available DELETE tests:"
        echo "  - test_peo_deleted_successfully"
        echo "  - test_multiple_peo_deleted_simultaneously"
        echo "  - test_delete_checkbox_can_be_unchecked"
        echo "  - test_edit_and_delete_simultaneously"
        return 1
    fi
    
    print_header "Running DELETE Test: $test_name"
    php artisan dusk tests/Browser/DeletePEOTest.php --filter=$test_name
}

# Run all tests verbose
run_verbose() {
    print_header "Running All Tests (Verbose Mode)"
    php artisan dusk tests/Browser/AddPEOTest.php tests/Browser/EditPEOTest.php tests/Browser/DeletePEOTest.php --verbose
}

# Run all tests with screenshot
run_screenshot() {
    print_header "Running All Tests (Screenshot on Failure)"
    php artisan dusk tests/Browser/AddPEOTest.php tests/Browser/EditPEOTest.php tests/Browser/DeletePEOTest.php --screenshots-on-failure
}

# Main logic
case "${1:-help}" in
    all)
        run_all_tests
        ;;
    add)
        run_add_tests
        ;;
    edit)
        run_edit_tests
        ;;
    delete)
        run_delete_tests
        ;;
    add:filter)
        run_add_filter "$2"
        ;;
    edit:filter)
        run_edit_filter "$2"
        ;;
    delete:filter)
        run_delete_filter "$2"
        ;;
    verbose)
        run_verbose
        ;;
    screenshot)
        run_screenshot
        ;;
    install)
        install_dusk
        ;;
    help|--help|-h)
        show_help
        ;;
    *)
        print_error "Unknown option: $1"
        show_help
        exit 1
        ;;
esac

print_success "Done!"

