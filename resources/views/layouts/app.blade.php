<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Synerque - Project Management</title>
        <meta name="description" content="Synerque is a project management tool that helps you organize your tasks, collaborate with your team, and track your progress.">
        <meta name="keywords" content="project management, task management, collaboration, productivity">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
              theme: {
                extend: {
                  colors: {
                    'brand-dark': '#121212',
                    'brand-card': '#1E1F21',
                    'brand-light-text': '#E0E0E0',
                    'brand-secondary-text': '#8A8F98',
                  },
                  fontFamily: {
                    sans: ['Instrument Sans', 'sans-serif'],
                  }
                }
              }
            }
        </script>
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-brand-dark text-brand-light-text font-sans">

        <div class="w-full">
            {{ $slot }}
        </div>

    </body>
</html>