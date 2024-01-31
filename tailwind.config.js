const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/**/**/*.blade.php",
        "./resources/**/**/**/**/*.blade.php",
        "./resources/**/**/**/**/**/*.blade.php",
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                serif: ['Lora', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                'brique': {
                    100: '#ffc6c3',
                    300: '#F39995',
                    500: '#CA615B',
                    DEFAULT: "#A2352F",
                    900: '#75130E',
                },
                'bleu': {
                    100: '#99AAC3',
                    300: '#687FA0',
                    500: '#435E86',
                    DEFAULT: "#26426B",
                    900: '#0F284D',
                },
                'vert': {
                    100: '#52B7A3',
                    300: '#2EA08A',
                    500: '#10997E',
                    DEFAULT: "#057A63",
                    900: '#00604D',
                },
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
    ],
};
