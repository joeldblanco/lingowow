const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                lw: {
                    blue: '#3246BA',
                    light_blue: '#229dff',
                    lighter_blue: '#02e2ff',
                    lightest_blue: '#01ffe9',
                    yellow: '#ffc007',
                    magenta: '#e91e63',
                    red: '#f34236'
                }
            },
        },
    },

    variants: {
        extend: {
            // opacity: ['disabled'],
            backgroundColor: ['active'],
            visibility: ['group-hover'],
            brightness: ['hover'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
