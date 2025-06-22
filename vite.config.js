import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/', // biar path-nya relatif
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/homepage.css',
            ],
            refresh: true,
        }),
    ],
});
