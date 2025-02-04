import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import laravel from 'laravel-vite-plugin'
import path from 'path'

export default defineConfig({
  plugins: [
    tailwindcss(), // Подключаем Tailwind CSS
    laravel({
      input: [
        'resources/css/app.css',  // Путь к вашему основному стилю
        'resources/js/app.js',    // Путь к вашему основному JS файлу
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'), // Устанавливаем алиас для удобства
    },
  },
  server: {
    proxy: {
      '/app': 'http://localhost', // Если необходимо проксировать запросы для локальной разработки
    },
  },
})
