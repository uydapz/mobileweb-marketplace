<x-LoginLayout :title="'Register'">
    <div class="login-header text-center mb-6">
        <div class="logo mx-auto mb-4">
            <x-atoms.logo-dark class="w-16 h-16" />
        </div>
    </div>
    <h4 class="text-2xl font-bold text-gray-800">Buat akunmu!</h4>
    <p class="text-gray-500 mt-2">Jadi bagian dari XOlovers</p>
    <x-atoms.alert />
    <form method="POST" action="{{ route('register') }}" class="w-full" style="margin-top:20px;">
        @csrf
        <x-atoms.text-input id="name" name="name" type="name" label="{{ __('msg.fullname') }}"
            placeholder="{{ __('msg.fullname_plc') }}" required autofocus />

        <x-atoms.text-input id="email" name="email" type="email" label="{{ __('msg.email') }}"
            placeholder="{{ __('msg.email_plc') }}" required autofocus />

        <x-atoms.password-input id="password" name="password" label="{{ __('msg.password') }}"
            placeholder="{{ __('msg.password_plc') }}" required autocomplete="new-password" />

        <x-atoms.password-input id="password_confirmation" name="password_confirmation"
            label="{{ __('msg.con_password') }}" placeholder="{{ __('msg.con_password_plc') }}" required
            autocomplete="new-password" />

        <x-atoms.button type="submit" login="true" color="primary" icon="fas fa-user-plus me-2">
            {{ __('msg.register') }}
        </x-atoms.button>

        <div class="bottom-links mt-4 text-sm text-center">
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-1"></i>
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>

    <x-atoms.social-login title="Or sign in with" :buttons="[
        [
            'provider' => 'google',
            'color' => 'text-danger',
            'hover' => 'hover:bg-red-50',
            'icon' => 'fab fa-google',
            'url' => route('home', 'google'),
        ],
        [
            'provider' => 'facebook',
            'color' => 'text-primary',
            'hover' => 'hover:bg-blue-50',
            'icon' => 'fab fa-facebook-f',
            'url' => route('home', 'facebook'),
        ],
    ]" />

</x-LoginLayout>
