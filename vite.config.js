import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
    host: '0.0.0.0',
    port: process.env.PORT || 3000,  // Usa el puerto de Railway o uno por defecto
    },
    build: {
        manifest: true,  // Genera manifest.json en public/build
        outDir: 'public/build',  // Carpeta de salida
    },
});
