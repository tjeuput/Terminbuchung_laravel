/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Helvetica', 'Helvetica Neue', 'Arial', 'sans-serif'],
            },
        },
    },
    plugins: [],
}
