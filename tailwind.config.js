/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      padding: {
        '50px': '50px',
      },
    },
  },
  plugins: [],
}
