import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/bootstrap/bootstrap.js',
                'resources/css/bootstrap/bootstrap.css',
                'resources/css/style.css',
                'resources/js/main.js',
                // Recursos vendor .css
                'resources/vendor/aos/aos.css',
                'resources/vendor/bootstrap/css/bootstrap.min.css',
                'resources/vendor/bootstrap-icons/bootstrap-icons.css',
                'resources/vendor/boxicons/css/boxicons.min.css',
                'resources/vendor/glightbox/css/glightbox.min.css',
                'resources/vendor/swiper/swiper-bundle.min.css',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
