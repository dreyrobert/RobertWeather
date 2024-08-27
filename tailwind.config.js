/** @type {import('tailwindcss').Config} */

const { env } = require('process');

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },
      backgroundImage: {
        'black-homepage': `url('/public/images/homepage.webp')`,
        '1': `url('/public/images/1.webp')`,
        '2': `url('/public/images/2.webp')`,
        '3': `url('/public/images/3.webp')`
      }
    },
  },
  plugins: [],
}