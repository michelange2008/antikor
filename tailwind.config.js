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
    safelist: [
        'bg-red-300',
        'bg-green-300',
        'bg-blue-300',
        'bg-lime-300',
        'bg-orange-300',
        'bg-slate-300',
        'bg-pink-300',
        'bg-red-700',
        'bg-green-700',
        'bg-blue-700',
        'bg-lime-700',
        'bg-orange-700',
        'bg-slate-700',
        'bg-pink-700',

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
                    700: "#A2352F",
                    900: '#75130E',
                },
                'bleu': {
                    100: '#99AAC3',
                    300: '#687FA0',
                    500: '#435E86',
                    700: "#26426B",
                    900: '#0F284D',
                },
                'vert': {
                    100: '#c2fff3ff',
                    300: '#96f3e1ff',
                    500: '#10997E',
                    700: "#057A63",
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
