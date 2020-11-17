const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
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
                'cm-background': '#f5f5f5',
                'cm-main-pink': '#EE69A4',
                'cm-pink1': '#FADBDF',
                'cm-pink2': '#F0949F',
                'cm-yellow': '#EFEAE3',
                'cm-cherry': '#d53032'
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
