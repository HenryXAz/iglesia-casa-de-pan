/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                dark: {
                    // rosepine theme
                    'color-1': '#191724',
                    'color-2': '#1f1d2e',
                    'color-3': '#403d52',
                    'color-4': '#26233a',
                    'text': '#D1D5DB',
                    'gold': '#f6c177',
                },
                light: {
                    'color-1': '#F8F9FA',
                    'color-2': '#E9ECEF',
                    'text': '#111827',
                    'gold': '#ea9d34',
                    'subtle': '#797593',
                },
                main: {
                    'primary': '#7C3AED',
                    'primary-hard': '#5B21B6',
                    'rose': '#B91C1C',
                    'rose-light': '#F43F5E',
                    'light-primary': '#2563EB',
                }
            }
        },
    },
    plugins: [],
}

