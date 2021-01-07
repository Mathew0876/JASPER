const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            purple: {
                400: '7B84DB',
            },
            white: colors.white,
            gray: {
                600: '515151',
            },
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['hover'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
