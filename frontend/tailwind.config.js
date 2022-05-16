module.exports = {
  purge: [],
  content: [
    "./node_modules/flowbite/**/*.js"
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
],

}