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
    hmr: {
      host: process.env.VITE_APP_URL || 'localhost',
    },
    },
    build: {
        manifest: true,  // Genera manifest.json en public/build
        outDir: 'public/build/.vite',  // Carpeta de salida
    },
});
