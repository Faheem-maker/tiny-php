<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiny Framework</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-[#1E293B] antialiased">
    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-indigo-500 selection:text-white">

        <!-- Navigation -->
        <nav class="absolute top-0 right-0 p-6 flex space-x-4">
            <a href="{{ app()->url->named('auth.login') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log
                in</a>
            <a href="{{ app()->url->named('auth.register') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Register</a>
        </nav>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <!-- Simple Logo Placeholder -->
                <img alt="Tiny PHP Logo" src="/img/logo.png" class="h-64 w-auto">
            </div>

            <div class="text-center">
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    The minimal, yet powerful PHP framework for building modern web applications with speed and
                    simplicity.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <!-- Documentation -->
                <a href="https://faheemanis.rf.gd/projects/tiny-php" target="_blank"
                    class="scale-100 p-6 bg-white rounded-2xl shadow-sm border border-gray-100 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                    <div>
                        <div class="h-16 w-16 bg-indigo-50 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-7 h-7 text-indigo-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18c-2.305 0-4.408.867-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900">Documentation</h2>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            Tiny has wonderful, thorough documentation covering every aspect of the framework. Whether
                            you are new to the framework or have previous experience, we recommend using the
                            documentation
                            to understand the available features.
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="self-center shrink-0 stroke-indigo-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>

                <!-- Next Steps -->
                <a href="https://faheemanis.rf.gd/projects/tiny-php/docs/getting-started/controllers.html"
                    class="scale-100 p-6 bg-white rounded-2xl shadow-sm border border-gray-100 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                    <div>
                        <div class="h-16 w-16 bg-indigo-50 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-7 h-7 text-indigo-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.59 8.37m6 6l1.28-1.28a1 1 0 011.41 0l.96.96a1 1 0 010 1.41l-1.28 1.28a1 1 0 01-1.41 0l-.96-.96a1 1 0 010-1.41zM13.5 13.5l-4-4" />
                            </svg>
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900">Next Steps</h2>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            Ready to start building? Check out our quickstart guide to create your first controller and
                            route. Or explore the cli tool by running <code>php tiny</code> in your terminal.
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="self-center shrink-0 stroke-indigo-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/Faheem-maker/tiny-php"
                            class="group inline-flex items-center hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 group-hover:stroke-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    PHP v<?php echo PHP_VERSION; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>