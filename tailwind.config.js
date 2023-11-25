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
        montecarlo : ['MonteCarlo'],
        inter : ['Inter'],
        libre : ['Libre Franklin'],
        dancing : ['Dancing Script'],
        shippori : ['Shippori Mincho'],
      }
    },
  },
  plugins: [
  ],
}

