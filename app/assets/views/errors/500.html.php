<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full bg-slate-50 antialiased flex items-center justify-center p-6">

    <div class="max-w-xl w-full text-center">
        <!-- Error Icon (Shield/Warning) -->
        <div class="mb-8 inline-flex items-center justify-center w-20 h-20 bg-white rounded-3xl shadow-sm border border-slate-200">
            <svg class="w-10 h-10 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>

        <!-- Error Heading -->
        <h1 class="text-9xl font-extrabold tracking-tight text-slate-200 select-none">500</h1>
        
        <div class="relative -mt-12">
            <h2 class="text-3xl font-semibold text-slate-800 mb-4">Something went wrong</h2>
            <p class="text-lg text-slate-500 mb-10 leading-relaxed">
                We're experiencing an internal server problem. Our team has been notified and we're working to fix the issue. Please try refreshing the page or come back later.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <button onclick="window.location.reload()" class="w-full sm:w-auto px-8 py-3 bg-slate-900 hover:bg-black text-white font-medium rounded-xl transition-all duration-200 shadow-lg shadow-slate-200 flex items-center justify-center group">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Refresh Page
                </button>
                
                <a href="{{ app()->url->to('/') }}" class="w-full sm:w-auto px-8 py-3 bg-white hover:bg-slate-50 text-slate-600 font-medium rounded-xl border border-slate-200 transition-all duration-200 flex items-center justify-center">
                    Return Home
                </a>
            </div>
        </div>

        <!-- Minimal Footer -->
        <footer class="mt-20">
            <p class="text-sm text-slate-400 font-light tracking-wide uppercase">
                &copy; <script>document.write(new Date().getFullYear())</script> Framework Name
            </p>
        </footer>
    </div>

</body>
</html>