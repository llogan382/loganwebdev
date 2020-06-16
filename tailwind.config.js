module.exports = {
  purge: [
    './*.php',
    './template-parts/*.php',
  ],
  theme: {
    extend: {},
  },
  variants: {
    height: ['responsive', 'hover', 'focus', 'group-hover'],
    display: ['responsive', 'hover', 'focus', 'group-hover'],
    textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    textDecoration: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
  },
  plugins: [],
}
