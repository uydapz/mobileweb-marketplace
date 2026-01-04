<x-LoginLayout :title="'Reset Password'">
    <div class="login-header text-center mb-6">
        <div class="logo mx-auto mb-4">
            <x-atoms.logo-dark />
        </div>
    </div>
    <x-atoms.alert />
    <h4 class="text-2xl font-bold text-gray-800">Reset Password</h4>
    <p class="text-gray-500 mt-2">MinXO bantu sampe sini aja ya, see u di dashboard😀👌</p>

    <!-- Back to Home Button -->
    <a href="{{ url('/') }}" style="text-decoration: none;"
        class="inline-block mt-4 text-sm text-primary hover:text-secondary">
        <i class="fas fa-arrow-left mr-1"></i> Batal
    </a>

    <form method="POST" action="{{ route('password.store') }}" style="margin-top: 20px;" class="w-full">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <x-atoms.text-input id="email" name="email" type="email" label="{{ __('msg.email') }}"
            placeholder="Enter your email" required autofocus :value="old('email', request()->email)" />

        <x-atoms.password-input id="password" name="password" label="{{ __('New Password') }}" placeholder="***"
            required />

        <x-atoms.password-input id="password_confirmation" name="password_confirmation"
            label="{{ __('Confirm New Password') }}" placeholder="***" required />
        <div class="flex items-center justify-center mt-6">
            <x-atoms.button type="submit" color="primary" login="true" color="primary" icon="fas fa-power-off">
                {{ __('Reset Password') }}
            </x-atoms.button>
        </div>
    </form>
</x-LoginLayout>
