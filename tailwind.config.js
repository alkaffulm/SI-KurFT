import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "biru-custom": "#5FA9C8",
                "teks-biru-custom": "#264450",
                "teks-hitam-custom": "#0A0A0A",
                "putih-custom": "#FAFAFA",
                "bg-custom": "#CFE5EF",
                "abu-custom": "#525252",
            },
        },
    },
    plugins: [],
};
