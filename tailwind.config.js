const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                museo: ["MuseoModerno", "cursive"],
                sans: ["League Spartan", "sans-serif"]
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
