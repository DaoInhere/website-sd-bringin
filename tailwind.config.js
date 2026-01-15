<<<<<<< HEAD
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'sekolah-hijau': '#1a5d1a',
        'sekolah-hijau-light': '#2e8b57',
        'sekolah-hijau-dark': '#144a14',
        'sekolah-kuning': '#fcc006',
        'sekolah-kuning-dark': '#e0aa05',
        'sekolah-orange': '#f97316',
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
        nunito: ['Nunito', 'sans-serif'],
      },
      boxShadow: {
        'sekolah': '0 4px 6px -1px rgba(26, 93, 26, 0.1), 0 2px 4px -1px rgba(26, 93, 26, 0.06)',
        'sekolah-lg': '0 10px 15px -3px rgba(26, 93, 26, 0.1), 0 4px 6px -2px rgba(26, 93, 26, 0.05)',
      }
    },
  },
  plugins: [],
}
=======
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
>>>>>>> 20b2a43e8eef9bdcc3fa18c7822ed2dfddd2d793
