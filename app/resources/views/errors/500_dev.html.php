<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Development Error - Framework</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        code,
        pre {
            font-family: 'Fira Code', monospace;
        }

        .code-scroll::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .code-scroll::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .error-line {
            background-color: rgba(254, 226, 226, 1);
            border-left: 4px solid #ef4444;
        }

        .trace-item.active {
            background-color: white;
            border-color: #fecaca;
            border-left-width: 4px;
            border-left-color: #ef4444;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .code-line {
            display: flex;
            align-items: flex-start;
        }

        .code-number {
            width: 3rem;
            min-width: 3rem;
            text-align: right;
            padding-right: 0.8rem;
            color: #94a3b8;
            font-family: 'Fira Code', monospace;
            user-select: none;
            flex-shrink: 0;
        }

        .code-text {
            white-space: pre;
            flex: 1;
        }

        .error-line {
            background-color: rgba(254, 226, 226, 1);
            border-left: 4px solid #ef4444;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased min-h-screen pb-20">

    <!-- Top Status Bar -->
    <div class="bg-rose-600 text-white px-6 py-2 text-xs font-bold uppercase tracking-widest flex justify-between items-center">
        <span>Development Mode</span>
        <span>PHP {{ PHP_VERSION }} — Exception</span>
    </div>

    <!-- Error Header Section -->
    <header class="bg-white border-b border-slate-200 px-6 py-12 shadow-sm">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-start justify-between">
                <div>
                    <span class="inline-block px-3 py-1 rounded-full bg-rose-100 text-rose-700 text-xs font-bold mb-4 uppercase tracking-wider">
                        {{ get_class($ex) }}
                    </span>
                    <h1 id="error-message" class="text-4xl font-bold text-slate-900 mb-4 leading-tight">
                        {{ $ex->getMessage() }}
                    </h1>
                    <p class="text-slate-500 font-medium break-all">
                        at <span class="text-slate-800">{{ $ex->getFile() }}</span> : <span class="text-rose-600 font-bold">{{ $ex->getLine() }}</span>
                    </p>
                </div>
                <div class="hidden lg:flex gap-3">
                    <button id="copy-btn" class="px-4 py-2 bg-slate-900 text-white hover:bg-black rounded-lg text-sm font-semibold transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                        </svg>
                        Copy Message
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto mt-8 px-6 grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- Left Sidebar: Stack Trace -->
        <aside class="lg:col-span-4 order-2 lg:order-1">
            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Stack Trace</h3>
            <div class="space-y-1" id="trace-list">
                @foreach($ex->getTrace() as $i => $trace)
                @{
                if ($i == 0) continue;
                }
                <div id="trace-item-{{ $i }}" class="trace-item {{ $i == 1 ? 'active' : '' }} p-4 rounded-xl cursor-pointer border border-transparent transition-all" onclick="switchFile(this, {{ $i }})">
                    <p class="text-xs text-rose-600 font-bold mb-1">{{ basename($trace['file'] ?? $ex->getFile() ) }}:{{ $trace['line'] ?? $ex->getLine() }}</p>
                    <p class="text-sm font-semibold text-slate-800 break-all">{{ empty($trace['class']) ? '' : ($trace['class'] . '->' . $trace['function'] . '(' . ')') }}</p>
                </div>
                @endforeach
            </div>
        </aside>

        <!-- Right Content: Code Preview & Context -->
        <div class="lg:col-span-8 order-1 lg:order-2 space-y-6">

            <!-- Code Block -->
            @foreach($ex->getTrace() as $i => $trace)
            @{
            if ($i == 0) continue;

            $lines = file($trace['file'] ?? $ex->getFile());

            $line = $trace['line'] ?? $ex->getLine();

            $start = max(0, $line - 4);
            $end = min(count($lines), $line + 4);
            }

            <section class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden code-block {{ $i != 1 ? 'hidden' : '' }}" id="code-{{ $i }}">
                <div class="bg-slate-50 px-6 py-3 border-b border-slate-200 flex justify-between items-center">
                    <span class="text-sm font-medium text-slate-600" id="code-filename-display">{{ $trace['file'] ?? $ex->getFile() }}</span>
                    <span class="text-xs text-slate-400" id="code-lines-range">Lines {{ $start }} - {{ $end }}</span>
                </div>
                <div class="code-scroll overflow-x-auto p-0 text-sm leading-relaxed">
                    <pre class="m-0"><code class="block whitespace-pre" id="code-container">@for($i = $start; $i < $end; $i++)
<?php
    if ($line == $i) {
        echo '<div class="code-line error-line"><span class="code-number">' . $i . '</span><span class="code-text">' . htmlspecialchars($lines[$i-1]) . '</span></div>';
    } else {
        echo '<div class="code-line"><span class="code-number">' . $i . '</span><span class="code-text">' . htmlspecialchars($lines[$i-1]) . '</span></div>';
    }
?>
@endfor</code></pre>
                </div>
            </section>
            @endforeach

            <!-- Context Tabs -->
            <section class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <nav class="flex border-b border-slate-200 bg-slate-50" id="tabs-nav">
                    <button onclick="switchTab(this, 'env')" class="tab-btn px-6 py-3 text-sm font-semibold border-b-2 border-rose-500 text-rose-600">Environment</button>
                    <button onclick="switchTab(this, 'req')" class="tab-btn px-6 py-3 text-sm font-semibold text-slate-500 hover:text-slate-800 border-b-2 border-transparent">Request</button>
                    <button onclick="switchTab(this, 'sess')" class="tab-btn px-6 py-3 text-sm font-semibold text-slate-500 hover:text-slate-800 border-b-2 border-transparent">Session</button>
                </nav>
                <div class="p-6">
                    <!-- Environment Tab -->
                    <div id="tab-env" class="tab-content active">
                        <table class="w-full text-sm">
                            <tr class="border-b border-slate-100">
                                <td class="py-3 font-bold text-slate-400 w-1/3">PHP Version</td>
                                <td class="py-3 text-slate-700 font-mono">{{ phpversion() }}</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-bold text-slate-400">Mode</td>
                                <td class="py-3 text-slate-700 font-mono">DEBUG</td>
                            </tr>
                        </table>
                    </div>
                    <!-- Request Tab -->
                    <div id="tab-req" class="tab-content">
                        <table class="w-full text-sm">
                            <tr class="border-b border-slate-100">
                                <td class="py-3 font-bold text-slate-400 w-1/3">Method</td>
                                <td class="py-3 text-slate-700 font-mono text-blue-600 font-bold">{{ request()->method() }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <td class="py-3 font-bold text-slate-400">URL</td>
                                <td class="py-3 text-slate-700 font-mono">{{ request()->path() }}</td>
                            </tr>
                            @foreach (request()->input() as $key => $value)
                            <tr>
                                <td class="py-3 font-bold text-slate-400">{{ $key }}</td>
                                <td class="py-3 text-slate-400 text-xs font-mono">{{ $value }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- Session Tab -->
                    <div id="tab-sess" class="tab-content">
                        <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                            <code class="text-xs text-slate-600 leading-relaxed block whitespace-pre-wrap">{{ print_r(session()->get()) }}</code>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <script>
        // Copy functionality
        document.getElementById('copy-btn').addEventListener('click', function() {
            const text = document.getElementById('error-message').innerText;
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);

            const originalText = this.innerHTML;
            this.innerHTML = "Copied!";
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        });

        // Tab Switching
        function switchTab(btn, tabId) {
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('border-rose-500', 'text-rose-600');
                b.classList.add('text-slate-500', 'border-transparent');
            });
            btn.classList.add('border-rose-500', 'text-rose-600');
            btn.classList.remove('text-slate-500', 'border-transparent');

            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            document.getElementById('tab-' + tabId).classList.add('active');
        }

        // File/Trace Switching (Dummy simulation)
        function switchFile(el, num) {
            document.querySelectorAll('.code-block').forEach(el => {
                el.classList.remove('active');
                el.classList.add('hidden');
            });

            document.getElementById(`code-${num}`).classList.remove('hidden');

            document.querySelectorAll('.trace-item').forEach(el => {
                el.classList.remove('active');
            });
            document.getElementById(`trace-item-${num}`).classList.add('active');
        }
    </script>
</body>

</html>