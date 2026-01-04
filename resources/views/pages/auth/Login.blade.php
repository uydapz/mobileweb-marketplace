<x-LoginLayout :title="__('msg.login')">
    <div class="login-header text-center mb-6">
        <div class="logo mx-auto mb-4">
            <x-atoms.logo-dark class="w-16 h-16" />
        </div>
    </div>

    <a href="{{ route('home') }}" class="inline-block mt-4 text-sm text-dark hover:text-secondary"
        style="text-decoration:none;">
        <i class="fas fa-arrow-left mr-1"></i> HOME
    </a>
    <x-atoms.alert :message="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-5">
        @csrf

        <div class="form-group relative mb-4">
            <x-atoms.text-input id="email" name="email" type="email" label="{{ __('Email Address') }}"
                placeholder="Enter your email" required autofocus />
        </div>

        <div class="form-group relative mb-4">
            <x-atoms.password-input id="password" name="password" label="{{ __('Password') }}" placeholder="***"
                required />
        </div>

        <div class="flex items-center mt-4">
            <x-atoms.checkbox id="remember_me" name="remember" label="{{ __('Remember me') }}" />
        </div>
        
        <x-atoms.button type="submit" login="true" color="primary" icon="fas fa-sign-in-alt">
            {{ __('Sign In') }}
        </x-atoms.button>

        <div class="bottom-links flex justify-between mt-4 text-sm">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800"
                    style="text-decoration:none;">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800" style="text-decoration:none;">
                {{ __('Baru kenal MinXO?') }}
            </a>
        </div>

        <x-atoms.social-login title="Or sign in with" :buttons="[
            [
                'provider' => 'google',
                'color' => 'text-danger',
                'hover' => 'hover:bg-red-50',
                'icon' => 'fab fa-google',
                'url' => url('google'),
            ],
            [
                'provider' => 'facebook',
                'color' => 'text-primary',
                'hover' => 'hover:bg-blue-50',
                'icon' => 'fab fa-facebook-f',
                'url' => url('facebook'),
            ],
        ]" />
    </form>
</x-LoginLayout>
