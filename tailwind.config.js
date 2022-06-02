const defaultTheme = require('tailwindcss/defaultTheme');

function withOpacityValue(variable) {
    return ({ opacityValue }) => {
        if (opacityValue === undefined) {
            return `rgb(var(${variable}))`
        }
        return `rgb(var(${variable}) / ${opacityValue})`
    }
}

module.exports = {
    darkMode: 'class',

    content: [
        './resources/js/**/*.js',
        './public/js/**/*.js',

        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php'
    ],

    safelist: [
        /* rules that always need to be compiled - WARNING */
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'transparent': 'transparent',
                'current': 'currentColor',

                'primary': withOpacityValue('--color-primary'),
                'secondary': withOpacityValue('--color-secondary'),
                'success': withOpacityValue('--color-success'),
                'danger': withOpacityValue('--color-danger'),
                'warning': withOpacityValue('--color-warning'),
                'info': withOpacityValue('--color-info'),

                'theme': withOpacityValue('--bg-theme'),
                'header': withOpacityValue('--bg-header'),
                'body': withOpacityValue('--bg-body'),
                'aside': withOpacityValue('--bg-aside')

            },

            keyframes: {
                'fade': {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' }
                },

                'fade-up': {
                    '0%': { transform: 'translateY(1.25rem)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' }
                },

                'fade-down': {
                    '0%': { transform: 'translateY(-1.25rem)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' }
                },

                'fade-right': {
                    '0%': { transform: 'translateX(-1.25rem)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' }
                },

                'fade-left': {
                    '0%': { transform: 'translateX(1.25rem)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' }
                },

                'zoom-in': {
                    '0%': { transform: 'scale(.95)', opacity: '0' },
                    '100%': { transform: 'scale(1)', opacity: '1' }
                },

                'zoom-out': {
                    '0%': { transform: 'scale(1.2)', opacity: '0' },
                    '100%': { transform: 'scale(1)', opacity: '1' }
                },

                'waves': {
                    '0%': { transform: 'scale(0)', opacity: '1' },
                    '100%': { transform: 'scale(10)', opacity: '0' }
                }
            },

            animation: {
                'fade': 'fade 300ms cubic-bezier(0, 0, 0.2, 1) forwards',
                'fade-up': 'fade-up 300ms cubic-bezier(0, 0, 0.2, 1) forwards',
                'fade-down': 'fade-down 300ms cubic-bezier(0, 0, 0.2, 1) forwards',
                'fade-right': 'fade-right 300ms cubic-bezier(0, 0, 0.2, 1) forwards',
                'fade-left': 'fade-left 300ms cubic-bezier(0, 0, 0.2, 1) forwards',
                'zoom-in': 'zoom-in 300ms cubic-bezier(0, 0, 0.2, 1) forwards',
                'zoom-out': 'zoom-out 300ms cubic-bezier(0, 0, 0.2, 1) forwards',
                'waves': 'waves 750ms linear infinite'
            }
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
