import defaultTheme from 'tailwindcss/defaultTheme'
import form from '@tailwindcss/forms'
import { nextui } from '@nextui-org/react'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.tsx',
        './resources/**/*.ts',
        './node_modules/@nextui-org/theme/dist/**/*.{js,ts,jsx,tsx}'
    ],
    theme: {
        extend: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            colors: {
                'main-bg': '#f4f2ee',
                'main-blue-light': '#0a4181',
                'secondary-blue-light': '#d9e9fa',
                'main-text': '#191919',
                'main-green': '#00A86B',
                'main-blue': '#236899 ',
                'secondary-blue': '#B4CBDB',
                primary: {
                    100: '#f0f4ff',
                    200: '#d9e2ff',
                    300: '#a6c1ff',
                    400: '#598bff',
                    500: '#3366ff',
                    600: '#254ed8',
                    700: '#1939b7',
                    800: '#102693',
                    900: '#091a7a'
                },
                secondary: {
                    100: '#f5f5f5',
                    200: '#e0e0e0',
                    300: '#b0b0b0',
                    400: '#757575',
                    500: '#333333',
                    600: '#2b2b2b',
                    700: '#242424',
                    800: '#1a1a1a',
                    900: '#121212'
                },
                success: {
                    100: '#f0fdf4',
                    200: '#dcfce7',
                    300: '#bbf7d0',
                    400: '#86efac',
                    500: '#4ade80',
                    600: '#22c55e',
                    700: '#179848',
                    800: '#0e7f2e',
                    900: '#0a6521'
                },
                warning: {
                    100: '#fffdf0',
                    200: '#fefcbf',
                    300: '#faf089',
                    400: '#f6e05e',
                    500: '#ecc94b',
                    600: '#d69e2e',
                    700: '#b7791f',
                    800: '#975a16',
                    900: '#744210'
                },
                danger: {
                    100: '#fff2f2',
                    200: '#ffd6d9',
                    300: '#ffa8b4',
                    400: '#ff708d',
                    500: '#ff3d71',
                    600: '#db2c66',
                    700: '#b81d5b',
                    800: '#94124e',
                    900: '#700940'
                },
                dark: {
                    100: '#f0f0f0',
                    200: '#d9d9d9',
                    300: '#bfbfbf',
                    400: '#a6a6a6',
                    500: '#8c8c8c',
                    600: '#737373',
                    700: '#595959',
                    800: '#404040',
                    900: '#262626'
                }
            }
        }
    },
    plugins: [form, nextui()]
}
