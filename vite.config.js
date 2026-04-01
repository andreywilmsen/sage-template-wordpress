import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin';

export default defineConfig({
  base: '/app/themes/veredict-advocacy/public/build/',
  server: {
    cors: true,
    strictPort: true,
    port: 5173,
    host: 'localhost',
    hmr: {
      host: 'localhost',
    },
  },
  plugins: [
    laravel({
      input: [
        'resources/css/app.scss',
        'resources/js/app.js',
        'resources/css/editor.scss',
        'resources/js/editor.js'
      ],
      refresh: true,
    }),
    wordpressPlugin(),
    wordpressThemeJson({ disableTailwindColors: true }),
  ],
})