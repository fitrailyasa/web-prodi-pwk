import defaultTheme from 'tailwindcss/defaultTheme'
import form from '@tailwindcss/forms'
import { nextui } from '@nextui-org/react'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.tsx',
        './resources/**/*.ts',
        './node_modules/@nextui-org/theme/dist/**/*.{js,ts,jsx,tsx}',
    ],
    theme: {
        extend: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        },
    },
    plugins: [form, nextui()],
}
