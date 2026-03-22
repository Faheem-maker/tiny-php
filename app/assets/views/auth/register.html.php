@layout('layouts.auth', [
    'title' => 'Register',
])

<h2 class="mt-6 text-3xl font-extrabold text-slate-900 tracking-tight">
    Create a New Account
</h2>
<p class="mt-2 text-sm text-slate-600">
    Or 
    <a href="{{ app()->url->named('auth.login') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
        Login Instead
    </a>
</p>
</div>

<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
<div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-3xl sm:px-10 border border-slate-100">
    <form id="loginForm" class="space-y-6" action="{{ app()->url->named('auth.store') }}" method="post">
        <input type="hidden" name="_csrf" value="{{ \framework\utils\security\Csrf::allocate() }}" />
        <!-- Email Field -->
        <div>
            <label for="username" class="block text-sm font-semibold text-slate-700">
                Username
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-lucide="user" class="h-5 w-5 text-slate-400"></i>
                </div>
                <input
                    id="username"
                    name="username"
                    type="text"
                    name="User[username]"
                    required
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all"
                    placeholder="john"
                >
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700">
                Email address
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-lucide="mail" class="h-5 w-5 text-slate-400"></i>
                </div>
                <input
                    id="email"
                    name="email"
                    type="email"
                    name="User[email]"
                    required
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all"
                    placeholder="you@example.com"
                >
            </div>
        </div>

        <!-- Password Field -->
        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-semibold text-slate-700">
                    Password
                </label>
            </div>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-lucide="lock" class="h-5 w-5 text-slate-400"></i>
                </div>
                <input
                    id="password"
                    name="password"
                    type="password"
                    name="User[password]"
                    required
                    class="block w-full pl-10 pr-10 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all"
                    placeholder="••••••••"
                >
                <button
                    type="button"
                    id="togglePassword"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors"
                >
                    <i data-lucide="eye" id="eyeIcon" class="h-5 w-5"></i>
                </button>
            </div>
        </div>
        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-semibold text-slate-700">
                    Confirm Password
                </label>
            </div>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-lucide="lock" class="h-5 w-5 text-slate-400"></i>
                </div>
                <input
                    id="confirm_password"
                    name="confirm_password"
                    type="password"
                    name="confirm_password"
                    required
                    class="block w-full pl-10 pr-10 py-2.5 border border-slate-200 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all"
                    placeholder="••••••••"
                >
                <button
                    type="button"
                    id="togglePassword"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors"
                >
                    <i data-lucide="eye" id="eyeIcon" class="h-5 w-5"></i>
                </button>
            </div>
        </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform active:scale-[0.98]"
                    >
                        Register
                        <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                    </button>
                </div>
            </form>
        </div>
        
        <p class="mt-8 text-center text-xs text-slate-400">
            By continuing, you agree to our Terms of Service and Privacy Policy.
        </p>