import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

// Custom PostCSS plugin to remove @charset rules
const removeCharsetPlugin = {
  postcssPlugin: 'internal:charset-removal',
  AtRule: {
    charset: (atRule) => {
      atRule.remove();
    },
  },
};

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/js/app.js',
        'resources/js/custom.js',
      ],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
    },
  },
  optimizeDeps: {
    include: ['quill', 'dropzone', 'cropperjs', '@fortawesome/fontawesome-free'], // Include Quill.js, Dropzone.js, Cropper.js, and FontAwesome
  },
  css: {
    postcss: {
      plugins: [removeCharsetPlugin],
    },
  }, 
  build: { 
    rollupOptions: { 
      external: ['perfect-scrollbar'], 
    }, 
  },
});
