@layout('layouts.auth', [
'title' => 'Login',
])

<h2 class="mt-6 text-3xl font-extrabold text-slate-900 tracking-tight">
    Welcome back
</h2>
<p class="mt-2 text-sm text-slate-600">
    Or
    <a href="{{ app()->url->named('auth.register') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
        create a new account
    </a>
</p>
</div>

<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-3xl sm:px-10 border border-slate-100">
        <Forms.ActiveForm :model="$model" :action="app()->url->named('auth.validate')" method="POST">
            <Forms.TextField name="email" />
            <Forms.TextField name="password" />

            <!-- Submit Button -->
            <div>
                <Forms.Button variant="primary" class-name="w-full flex justify-center items-center py-3 px-4 rounded-xl">
                    Sign In
                    <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                </Forms.Button>
            </div>
        </Forms.ActiveForm>
    </div>
</div>

<p class="mt-8 text-center text-xs text-slate-400">
    By continuing, you agree to our Terms of Service and Privacy Policy.
</p>