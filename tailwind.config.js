/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/**/*.blade.php",
    "./resources/**/*.js",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      animation:{
        'loop-scroll':'loop-scroll 75s linear infinite',
      },  
      keyframes:{
        'loop-scroll':{
          from:{ transform: 'translateX(0)' },
          to:{ transform: 'translateX(-100%)' },
        },
      }
    },
  },
  plugins: [],

}
