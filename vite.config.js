import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    base: '/build/', // ¡Clave para que Railway sirva los assets!
    build: {
        outDir: 'public/build', // Ruta relativa correcta
        emptyOutDir: true,
        manifest: true,
        assetsDir: 'assets',
        rollupOptions: {
            input: [
                'resources/js/app.js',
                'resources/sass/app.scss'
            ],
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/sass/app.scss'
            ],
            refresh: true,
        }),
    ],
});
