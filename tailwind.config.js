import defaultTheme from "tailwindcss/defaultTheme";
import form from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.tsx",
        "./resources/**/*.ts",
  ],
  theme: {
    extend: {
        sans : [
            'Figtree',
            ...defaultTheme.fontFamily.sans,
        ]
    },
  },
  plugins: [
    form
  ],
}

