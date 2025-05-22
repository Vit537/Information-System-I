import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    base: '/build/', // ¡Clave para Railway!
    build: {
        outDir: 'public/build',
        manifest: true,
        emptyOutDir: true,
        assetsDir: 'assets'
    },
    rollupOptions: {
      output: {
        // Elimina la subcarpeta .vite
        assetFileNames: 'assets/[name].[hash][extname]',
        entryFileNames: 'assets/[name].[hash].js',
        chunkFileNames: 'assets/[name].[hash].js',
        manifest: 'manifest.json'  // Lo genera directamente en build/
      }
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
