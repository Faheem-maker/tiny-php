@{
app()->assets->addScript('/js/tiny/main.js');
app()->assets->addScript('/js/tiny/urls.js');
app()->assets->addCss('/css/style.css');
}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ \framework\web\utils\security\Csrf::allocate() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [V-cloak] {
            display: none !important;
        }
    </style>

    {{!! app()->assets->renderCss() }}
</head>

<body class="bg-slate-50 text-slate-900 antialiased min-h-screen">

    <!-- Navigation / Header -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-indigo-600 p-2 rounded-lg">
                        <i data-lucide="zap" class="h-5 w-5 text-white"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight">Tiny<span class="text-indigo-600">App</span></span>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="/"
                        class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Dashboard</a>
                    <a href="#"
                        class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Projects</a>
                    <a href="#"
                        class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Settings</a>
                </nav>

                <div class="flex items-center gap-4">
                    <button class="p-2 text-slate-400 hover:text-slate-600 transition-colors">
                        <i data-lucide="search" class="h-5 w-5"></i>
                    </button>
                    <div
                        class="h-8 w-8 rounded-full bg-slate-200 border border-slate-300 flex items-center justify-center text-xs font-bold text-slate-500">
                        JD
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{!! $content }}
    </main>

    <!-- Footer -->
    <footer class="mt-auto py-8 border-t border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-slate-500">
            &copy; <?= date('Y') ?> Tiny Framework. Built with speed and simplicity.
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>

    {{!! app()->assets->renderScripts() }}
</body>

</html>