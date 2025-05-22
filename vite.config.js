import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    build: {
        outDir: "public/build",
        manifest: true, // Genera manifest.json en public/build
        emptyOutDir: true,
        assetsDir: "",
        rollupOptions: {
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            output: {
                assetFileNames: "assets/[name].[hash][extname]",
                entryFileNames: "assets/[name].[hash].js",
            },
        },
    },
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
