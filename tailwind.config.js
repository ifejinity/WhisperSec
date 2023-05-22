/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      screens:{
        'xs' : '425px',
       },
    },
  },
  plugins: [],
}

