/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        // LATO sebagai font default teks
        sans: ['Lato', 'Instrument Sans', 'ui-sans-serif', 'system-ui'],

        // Heading tetap Montserrat
        heading: ['Montserrat', 'sans-serif'],
      },

      keyframes: {
        fadeUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        zoomIn: {
          '0%': { transform: 'scale(0.9)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
        slideLeft: {
          '0%': { opacity: '0', transform: 'translateX(-40px)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
        slideRight: {
          '0%': { opacity: '0', transform: 'translateX(40px)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
      },

      animation: {
        'fade-up': 'fadeUp 0.7s ease-out both',
        'fade-in': 'fadeIn 0.7s ease-out both',
        'zoom-in': 'zoomIn 0.6s ease-out both',
        'slide-left': 'slideLeft 0.7s ease-out both',
        'slide-right': 'slideRight 0.7s ease-out both',
      },
    },
  },
  plugins: [],
}
