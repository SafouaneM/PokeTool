const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        listStyleType: {
            roman: 'upper-roman',
        },
        extend: {
            backgroundImage: {
                'main-bg': "url('/img/mondstadt_bg.jpeg')",

            },

            keyframes: {
                'fade-in-down': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto']
            },
            animation: {
                'fade-in-down': 'fade-in-down 2.5s ease-out',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/aspect-ratio'),
    ],
};
