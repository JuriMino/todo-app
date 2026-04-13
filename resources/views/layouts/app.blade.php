  <!DOCTYPE html>
  <html lang="ja">
  <head>
      <meta charset="UTF-8">
      <title>@yield('title', 'ToDoアプリ')</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-gray-50 min-h-screen">
      <header class="bg-white shadow">
          <div class="max-w-5xl mx-auto px-6 py-4">
              <h1 class="text-2xl font-bold text-gray-800">ToDoアプリ</h1>
          </div>
      </header>

      <main class="max-w-5xl mx-auto px-6 py-8">
          @yield('content')
      </main>
  </body>
  </html>
