/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        montecarlo : ['MonteCarlo'],
        inter : ['Inter'],
        libre : ['Libre Franklin'],
        dancing : ['Dancing Script'],
        shippori : ['Shippori Mincho'],
      }
    },
  },
  plugins: [
    require("tw-elements/dist/plugin.cjs")
  ],
}

