module.exports = {
    purge: [],
    theme: {
        extend: {},
    },
    variants: {
        backgroundColor: ['responsive', 'hover', 'focus', 'odd'],
    },
    plugins: [
        require('@tailwindcss/ui'),
        require('tailwindcss-plugins/pagination'),
    ]
}
