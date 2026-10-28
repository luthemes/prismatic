import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  publicDir: false,
  build: {
    outDir: 'public/assets',   // Vite only manages this folder
    assetsDir: '',             // no extra nesting
    manifest: 'manifest.json', // lives at public/assets/manifest.json
    emptyOutDir: true,         // cleans old CSS/JS on each build
    rollupOptions: {
      input: {
        app: path.resolve(__dirname, 'resources/js/app.js'),
        nav: path.resolve(__dirname, 'resources/js/navigation.js'),
        screen: path.resolve(__dirname, 'resources/scss/screen.scss'),
        // Customizer assets. The stylesheets get a -style suffix so their output names
        // don't collide with the scripts of the same name.
        'customize-controls': path.resolve(__dirname, 'resources/js/customize-controls.js'),
        'customize-previews': path.resolve(__dirname, 'resources/js/customize-previews.js'),
        'customize-controls-style': path.resolve(__dirname, 'resources/scss/customize-controls.scss'),
        'customize-previews-style': path.resolve(__dirname, 'resources/scss/customize-previews.scss'),
      },
      output: {
        entryFileNames: 'js/[name]-[hash].js',
        chunkFileNames: 'js/[name]-[hash].js',
        assetFileNames: ({ name }) =>
          name && name.endsWith('.css')
            ? 'css/[name]-[hash][extname]'
            : 'media/[name]-[hash][extname]',
      },
    },
  },
});
