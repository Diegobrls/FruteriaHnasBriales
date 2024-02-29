import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/views/crearcesta.blade.php",
        "./resources/views/crearpedido.blade.php",
        "./resources/views/dashboard.blade.php",
        "./resources/views/editarcesta.blade.php",
        "./resources/views/miscestas.blade.php",
        "./resources/views/mispedidos.blade.php",
        "./resources/views/welcome.blade.php",
        "./resources/views/layouts/app.blade.php",
        "./resources/views/layouts/guest.blade.php",
        "./resources/views/layouts/navigation.blade.php",

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
