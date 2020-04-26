module.exports = {
  theme: {
    extend: {},
    pagination: theme => ({
      color: theme('colors.teal.600'),
    })
  },
  variants: {},
  plugins: [
    require('tailwindcss-plugins/pagination')
  ],
}
