<x-LoginLayout :title="'Confirm Password'">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-atoms.password-input id="password" name="password" label="{{ __('Password') }}" placeholder="***"
                required />
        </div>

        <div class="flex justify-end mt-4">
            <x-atoms.button type="submit" login="true" color="primary" icon="fas fa-check-double">
                {{ __('Confirm') }}
            </x-atoms.button>
        </div>
    </form>

</x-LoginLayout>
