import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/menu.js','resources/js/imageUpload.js','resources/js/barba.js'],
            refresh: true,
        }),
    ],
});
