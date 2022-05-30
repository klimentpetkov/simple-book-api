module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.vue'
  ],
  theme: {
    extend: {
      width: {
        '96': '24rem'
      }
    }
  },
  variants: {
    opacity: ['disabled'],
    cursor: ['disabled'],
  },
  plugins: []
}