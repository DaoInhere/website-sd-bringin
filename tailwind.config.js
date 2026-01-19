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
        
        'sekolah-hijau': '#0F766E',       // Teal tua elegan (sebelumnya hijau daun)
        'sekolah-kuning': '#F59E0B',      // Emas lembut (sebelumnya kuning terang)
        'sekolah-orange': '#D97706',      // Diselaraskan menjadi nuansa emas tua
        'sekolah-hijau-light': '#14B8A6', // Teal terang
        'sekolah-hijau-dark': '#115E59',  // Teal gelap
        'sekolah-kuning-dark': '#B45309', // Emas gelap/kecoklatan
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
        nunito: ['Nunito', 'sans-serif'],
      },
    },
  },
  plugins: [],
}