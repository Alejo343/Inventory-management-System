import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    build: {
        manifest: true,
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/app-dark.css",
                "resources/css/iconly.css",
                "resources/js/helper/isDesktop.js",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/dark.js",
                "resources/js/sidebar.js",
            ],
            refresh: true,
        }),
    ],
});
