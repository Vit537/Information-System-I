import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    base: '/build/', // ¡Clave para Railway!
    build: {
        outDir: 'public/build',
        manifest: true,
        emptyOutDir: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
