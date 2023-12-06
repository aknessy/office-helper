
module.exports = {
  daisyui: {
    themes: ["light", "dark", "cupcake", "corporate", "winter"],
  },
  content: [
    './app/Views/**/*.{html,js,php}',
  ],
  theme: {
    extend: {
      backgroundImage : {
        '404-bg' : "url('./public/imgs/404-bg.png)",
      }
    },
  },
  plugins: [
    //require("@tailwindcss/typography"),
    require('daisyui'),
  ],
}

