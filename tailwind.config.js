const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    {
      pattern: /bg-(cyan|green|blue)-(100|200|300|500)/,
    },
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
