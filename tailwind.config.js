module.exports = {
  theme: {
    extend: {},
    pagination: theme => ({
      color: theme('colors.teal.600'),
    }),
    spinner: (theme) => ({
      default: {
        color: '#dae1e7', // color you want to make the spinner
        size: '1em', // size of the spinner (used for both width and height)
        border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
        speed: '500ms', // the speed at which the spinner should rotate
      },
    })
  },
  variants: {},
  plugins: [
    require('tailwindcss-plugins/pagination'),
    require('tailwindcss-spinner')(),
  ],
}
