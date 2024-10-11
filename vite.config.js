import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/toggle-theme.js',
                'resources/js/posts_section.js',
            ],
            refresh: true,
        }),
    ],

    server: {
        host: '172.23.0.8',
        hmr: {
            host: '192.168.1.25',
        }
    }
});
