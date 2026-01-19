import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
<<<<<<< HEAD
});
=======
});
>>>>>>> 0a8733ca06f1dc745a2f1a9bdcdd13db6b9f0755
