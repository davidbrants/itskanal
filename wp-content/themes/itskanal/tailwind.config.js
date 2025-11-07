/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './assets/js/**/*.js',
    './template-parts/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        'its-blue': '#0024BE',
        'its-blue-light': '#597FDE',
        'its-blue-dark': '#001a8f',
        'its-cyan': '#00BCD4',
      },
      fontFamily: {
        'dm-sans': ['DM Sans', 'sans-serif'],
        'jost': ['Jost', 'sans-serif'],
      },
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem',
          sm: '2rem',
          lg: '4rem',
          xl: '5rem',
          '2xl': '6rem',
        },
      },
    },
  },
  plugins: [],
}
