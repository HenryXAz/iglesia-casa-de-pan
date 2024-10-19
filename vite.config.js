import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/toggle_theme.js',
                'resources/js/posts_section.js',
                'resources/js/tinymce.js',
            ],
            refresh: true,
        }),
    ],

    server: {
        host: '192.168.1.54:5173',
        hmr: {
            host: '192.168.1.54',
        }
    }
});
