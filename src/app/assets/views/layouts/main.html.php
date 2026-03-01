<!DOCTYPE html>
<html lang="en">

<head>

    @{
        $app->assets->addScript('js/main.js');
        $app->assets->addScript('js/tiny/main.js');
        $app->assets->addCss('css/style.css');
        $app->assets->addScript('js/ui/ui.js');
    }
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Tiny Tools - Simple Utilities</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Product+Sans:wght@400;700&display=swap" rel="stylesheet">
    {{!! $app->assets->renderCss() }}
</head>

<body class="min-h-screen">

    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-3 flex items-center justify-between">
        <div class="flex items-center gap-8 flex-1">
            <h1 class="brand-font text-2xl font-bold text-indigo-700 cursor-pointer" onclick="location.reload()">Tiny Tools</h1>

            <!-- Search Bar with Fuzzy Logic Mockup -->
            <div class="relative w-full max-w-md hidden sm:block">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" id="tool-search" placeholder="Search tools (e.g., 'case', 'json', 'math')..."
                    class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-full bg-gray-50 text-sm focus:bg-white transition-all">

                <!-- Search Results Dropdown -->
                <div id="search-results" class="absolute hidden w-full bg-white shadow-2xl rounded-2xl mt-2 border border-gray-100 p-2 z-[60]">
                    <!-- Results injected here -->
                </div>
            </div>

            <!-- Desktop Links -->
            <div class="hidden lg:flex gap-1">
                <div class="relative group">
                    <button class="nav-item px-4 py-2 text-sm font-medium text-gray-700">Text Tools</button>
                    <div class="absolute hidden group-hover:block w-48 bg-white shadow-xl rounded-xl mt-1 border border-gray-100 p-2">
                        <a href="#" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded-lg">Case Converter</a>
                        <a href="#" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded-lg text-indigo-600 font-medium">Letter Counter</a>
                        <a href="#" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded-lg">Whitespace Cleaner</a>
                    </div>
                </div>
                <div class="relative group">
                    <button class="nav-item px-4 py-2 text-sm font-medium text-gray-700">Converters</button>
                    <div class="absolute hidden group-hover:block w-48 bg-white shadow-xl rounded-xl mt-1 border border-gray-100 p-2">
                        <a href="#" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded-lg">JSON to YAML</a>
                        <a href="#" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded-lg">Unix Timestamp</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-6 py-12">
        <header class="mb-10 text-center">
            <nav class="flex justify-center space-x-2 text-xs text-gray-400 mb-4 uppercase tracking-widest font-medium">
                <a href="#" class="hover:text-indigo-600">Home</a>
                <span>/</span>
                <a href="#" class="hover:text-indigo-600">Text Tools</a>
                <span>/</span>
                <span class="text-indigo-600">{{ $title }}</span>
            </nav>
            <h2 class="text-4xl font-bold mt-2 mb-4 tracking-tight">Letter & Word Counter</h2>
            <p class="text-gray-500 max-w-lg mx-auto leading-relaxed">
                A simple, real-time tool to count characters, words, and sentences as you type.
            </p>
        </header>

        <!-- Tool Container -->
        {{!! $content }}
    </main>

    <footer class="mt-12 py-8 text-center text-gray-400 text-sm border-t border-gray-100">
        &copy; 2024 Tiny Tools &bull; Minimalist productivity
    </footer>

    {{!! $app->assets->renderScripts() }}
</body>

</html>