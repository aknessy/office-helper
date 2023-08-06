/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/components/**/*.{html,js,php}',
    './app/Views/errors/**/*.{html,js,php}',
    './app/Views/home/**/*.{html,js,php}',
    './app/Views/*.{html,js,php}',
    './app/*.html'
  ],
  theme: {
    extend: {
      backgroundImage : {
        '404-bg' : "url('./public/imgs)"
      }
    },
  },
  plugins: [],
}

