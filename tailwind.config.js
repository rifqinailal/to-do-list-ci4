/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.{html,php}",],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: ["light"],
  },
  plugins: [require("daisyui")],
}

