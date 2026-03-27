<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="h-full bg-slate-50 antialiased flex items-center justify-center p-6">

    <div class="max-w-xl w-full text-center">
        <!-- Minimalist Icon -->
        <div class="mb-8 inline-flex items-center justify-center w-20 h-20 bg-white rounded-3xl shadow-sm border border-slate-200">
            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <!-- Error Heading -->
        <h1 class="text-9xl font-extrabold tracking-tight text-slate-200 select-none">404</h1>
        
        <div class="relative -mt-12">
            <h2 class="text-3xl font-semibold text-slate-800 mb-4">Page not found</h2>
            <p class="text-lg text-slate-500 mb-10 leading-relaxed">
                The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ app()->url->to('/') }}" class="w-full sm:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition-all duration-200 shadow-lg shadow-blue-200 flex items-center justify-center group">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Homepage
                </a>
                
                <button onclick="window.history.back()" class="w-full sm:w-auto px-8 py-3 bg-white hover:bg-slate-50 text-slate-600 font-medium rounded-xl border border-slate-200 transition-all duration-200">
                    Go Back
                </button>
            </div>
        </div>
    </div>

</body>
</html>