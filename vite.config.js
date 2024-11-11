import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",

                "resources/css/simple-datatable.css",
                "resources/css/table.css",

                "resources/css/app-dark.css",
                "resources/css/iconly.css",

                "resources/js/dark.js",
                "resources/js/sidebar.js",

                "resources/js/simple-datatable.js",
                "resources/js/table.js",

                "resources/js/apexcharts.min.js",
                "resources/js/dashboard.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        minify: "esbuild",
        cssCodeSplit: true,
    },
});
