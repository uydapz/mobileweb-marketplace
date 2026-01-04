<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="
                {{ Str::startsWith(auth()->user()->avatar, 'http')
                    ? auth()->user()->avatar
                    : asset('storage/' . auth()->user()->avatar ?? 'adsets/img/avatars/default.png') }}"
                alt="{{ auth()->user()->name }}" class="w-px-40 h-auto rounded-circle object-cover" />
        </div>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
        {{-- User Info --}}
        <li>
            <a class="dropdown-item" href="#">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            <img src="
                                {{ Str::startsWith(auth()->user()->avatar, 'http')
                                ? auth()->user()->avatar
                                : asset('storage/' . auth()->user()->avatar ?? 'adsets/img/avatars/default.png') }}"
                                alt="{{ auth()->user()->name }}" class="w-px-40 h-auto rounded-circle object-cover" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                        <small class="text-muted">{{ auth()->user()->email }}</small>
                    </div>
                </div>
            </a>
        </li>

        <li>
            <div class="dropdown-divider"></div>
        </li>

        {{-- Profile --}}
        <x-atoms.user-dropdown-item href="{{ route('profile.edit') }}" icon="fa-user">
            {{ __('msg.my_profile') }}
        </x-atoms.user-dropdown-item>

        <x-atoms.user-dropdown-item href="{{ route('profile.edit') }}" icon="fa-gear">
            {{ __('msg.settings') }}
        </x-atoms.user-dropdown-item>

        {{-- <x-atoms.user-dropdown-item href="#" icon="fa-bell" badge="4">
            {{ __('msg.notifications') }}
        </x-atoms.user-dropdown-item> --}}

        <x-atoms.user-dropdown-item href="{{ route('language.index') }}" icon="fa-language">
            {{ __('msg.language') }}
        </x-atoms.user-dropdown-item>

        {{-- <x-atoms.user-dropdown-item href="{{ route('') }}" icon="fa-language">
            {{ __('msg.dark_mode') }}
        </x-atoms.user-dropdown-item> --}}

        <li>
            <div class="dropdown-divider"></div>
        </li>

        <li>
            <div class="m-2">
                <x-atoms.button :form="route('logout')" label="Log Out" icon="fa fa-power-off me-2" logout="true"
                type="submit" class="dropdown-item d-flex align-items-center" />
            </div>
        </li>
    </ul>
</li>
