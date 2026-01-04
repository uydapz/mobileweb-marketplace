<x-LoginLayout :title="'Forgot Password'">
    <div class="login-header text-center mb-6">
        <div class="logo mx-auto mb-4">
            <x-atoms.logo-dark />
        </div>
    </div>
    <h4>{{ __('Lupa Sandi?') }}</h4>
    <p class="text-gray-600 mb-6">
        {{ __('MinXO bantu sampe kamu dapet akses ya 😀👌') }}
    </p>

    <!-- Session Status -->
    <x-atoms.alert :message="session('status')"/>

    <form method="POST" action="{{ route('password.email') }}" class="w-full" style="margin-top: 20px;">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-atoms.text-input id="email" name="email" type="email" label="{{ __('msg.email') }}"
                placeholder="Enter your email" required autofocus />
        </div>
        <div class="flex items-center justify-center mt-6">
            <x-atoms.button type="submit" login="true" color="primary" icon="fas fa-power-off">
                {{ __('Reset Password') }}
            </x-atoms.button>
        </div>
    </form>
    <div class="bottom-links mt-4 text-sm text-center">
        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-1"></i>
            {{ __('Kembali Ke Login') }}
        </a>
    </div>
</x-LoginLayout>
