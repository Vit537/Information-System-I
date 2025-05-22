import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
     build: {
        outDir:	'public/build',
	manifest: true,  // Genera manifest.json en public/build
        emptyOutDir: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,

        }),
    ],

});
