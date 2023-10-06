const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/**/**/*.blade.php",
    ],

    theme: {
        extend: {
            content: {
                icon: 'url("./public/assets/icon.svg")',
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#7E3AF2",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
