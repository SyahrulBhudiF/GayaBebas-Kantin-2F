/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{html,php}', './components/**/*.{html,php}'],
  theme: {
    extend: {
      colors: {
        'Neutral/10': '#FFFFFF',
        'Neutral/20': '#F6F6F6',
        'Neutral/30': '#EEEEEE',
        'Neutral/40': '#E3E3E3',
        'Neutral/50': '#C6C6C6',
        'Neutral/60': '#A5A5A5',
        'Neutral/70': '#7F7F7F',
        'Neutral/80': '#6C6C6C',
        'Neutral/90': '#4D4D4D',
        'Neutral/100': '#1B1B1B',
        'Primary-blue': '#5E51D9',
        'Primary-surface': 'rgba(94, 81, 217, 0.08);'
      },
    },
  },
  plugins: [],
}
