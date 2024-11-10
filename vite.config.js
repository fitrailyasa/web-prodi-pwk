import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from "@vitejs/plugin-react";
import path from "path";
import { watch } from 'vite-plugin-watch';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.tsx'],
            refresh: true,
        }),
        react(),
        watch({
            pattern: 'app/{Data,Enums}/**/*.php',
            command: 'php artisan typescript:transform'
        }),
        watch({
            pattern : 'routes/guest.php',
            command : 'php artisan ziggy:generate',
        })
    ],
    resolve: {
        alias: {
            '!assets' : path.resolve(__dirname, './resources/assets'),
            'ziggy-js': path.resolve('vendor/tightenco/ziggy'),
        },
    },
    build: {
        minify: "terser",
        sourcemap: "hidden",
        manifest: "manifest.json",
        rollupOptions: {
            output: {
                // Template untuk nama asset yang menambahkan hash
                assetFileNames: `assets/[hash].[ext]`,
                // Template untuk nama chunks yang menambahkan hash
                chunkFileNames: `assets/[hash].js`,
                // Template untuk nama entry files yang menambahkan hash
                entryFileNames: `assets/[hash].js`,
            },
            onwarn(warning, defaultHandler) {
                if (warning.code === "SOURCEMAP_ERROR") {
                    return;
                }

                defaultHandler(warning);
            },
        },
    }
});
