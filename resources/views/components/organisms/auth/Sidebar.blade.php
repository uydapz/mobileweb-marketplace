<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme d-flex flex-column">

    {{-- Brand --}}
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo" style="margin: 12px;">
                <x-atoms.logo-dark />
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    {{-- Menu utama --}}
    <ul class="menu-inner py-1 flex-grow-1">
        <x-atoms.menu-header text="{{ __('msg.main') }}" />

        <x-atoms.menu-item icon="fa fa-gauge" label="{{ __('msg.dashboard') }}" href="{{ route('dashboard.index') }}"
            :active="request()->routeIs('dashboard.*')" />

        @if (Auth::user()->role == 1)
            <x-atoms.menu-item icon="fa fa-chart-line" label="{{ __('msg.analytic') }}"
                href="{{ route('analytic.index') }}" :active="request()->routeIs('analytic.*')" />

            <x-atoms.menu-item icon="fa fa-flag" label="{{ __('msg.banner') }}" href="{{ route('banner.index') }}"
                :active="request()->routeIs('banner.*')" />
        @endif
        
        <x-atoms.menu-item icon="fa fa-message" label="{{ __('msg.feedback') }}" href="{{ route('feedback.index') }}"
            :active="request()->routeIs('feedback.*')" />

        @if (Auth::user()->role == 1)
        <x-atoms.menu-header text="{{ __('msg.users') }}" />

        <x-atoms.menu-group icon="fa fa-box" label="{{ __('msg.product') }}"
            active="request()->routeIs('collection.*')" :items="[
                [
                    'label' => __('msg.collection'),
                    'href' => route('collection.index'),
                ],
                [
                    'label' => __('msg.category') . ' ' . __('msg.collection'),
                    'href' => route('category-collection.index'),
                ],
            ]" />

        <x-atoms.menu-item icon="fa fa-image" label="Lookbook" href="{{ route('lookbook.index') }}"
            :active="request()->routeIs('lookbook.*')" />

        <x-atoms.menu-item icon="fa fa-book" label="{{ __('msg.story') }}" href="{{ route('story.index') }}"
            :active="request()->routeIs('story.*')" />

        <x-atoms.menu-item icon="fa fa-newspaper" label="{{ __('msg.article') }}" href="{{ route('article.index') }}"
            :active="request()->routeIs('article.*')" />

        <x-atoms.menu-item icon="fa fa-calendar-check" label="{{ __('msg.event') }}" href="{{ route('event.index') }}"
            :active="request()->routeIs('event.*')" />

        <x-atoms.menu-item icon="fa fa-star" label="{{ __('msg.featured_design') }}"
            href="{{ route('featured-design.index') }}" :active="request()->routeIs('featured-design.*')" />

        <x-atoms.menu-item icon="fa fa-store" label="{{ __('msg.mart') }}" href="{{ route('mart.index') }}"
            :active="request()->routeIs('mart.*')" />

        <x-atoms.menu-item icon="fa fa-person-booth" label="{{ __('msg.vote') }}" href="{{ route('vote.index') }}"
            :active="request()->routeIs('vote.*')" />
        @endif

        {{-- Support --}}
        <x-atoms.menu-header text="{{ __('msg.support') }}" />

        @if (Auth::user()->role == 1)
        <x-atoms.menu-item icon="fa fa-circle-question" label="{{ __('msg.faq') }}" href="{{ route('faq.index') }}"
            :active="request()->routeIs('faq.*')" />

        <x-atoms.menu-item icon="fa fa-handshake" label="{{ __('msg.partnership') }}"
            href="{{ route('partnership.index') }}" :active="request()->routeIs('partnership.*')" />
        @endif
        
        <x-atoms.menu-item icon="fa fa-quote-right" label="{{ __('msg.testimoni') }}"
            href="{{ route('testimoni.index') }}" :active="request()->routeIs('testimoni.*')" />

        <x-atoms.menu-item icon="fa fa-info-circle" label="{{ __('msg.tutorial') }}"
            href="{{ route('tutorial.index') }}" :active="request()->routeIs('tutorial.*')" />

        {{-- Admin Panel (hanya admin) --}}
        @can('admin')
            <x-atoms.menu-group icon="fa fa-cogs" label="{{ __('msg.admin_panel') }}" :items="[
                ['icon' => 'fa fa-users', 'label' => 'Users', 'href' => route('admin.users.index')],
                ['icon' => 'fa fa-shield', 'label' => 'Roles & Permissions', 'href' => route('admin.roles.index')],
                ['icon' => 'fa fa-box', 'label' => 'Manage Products', 'href' => route('admin.products.index')],
            ]" />
        @endcan
    </ul>
    <ul class="menu-inner py-1 mt-auto border-t border-gray-300">
        <x-atoms.menu-header text="{{ __('msg.misc') }}" />

        <x-atoms.menu-item icon="fa fa-headset" label="{{ __('msg.support') }}" href="{{ route('support.index') }}"
            :active="request()->routeIs('support.*')" />

        <x-atoms.menu-group icon="fa fa-file-alt" label="{{ __('msg.documentation') }}" :items="[
            [
                'label' => __('msg.privacy'),
                'href' => route('privacy.index'),
            ],
            [
                'label' => __('msg.terms') . ' & ' . __('msg.conditions'),
                'href' => route('terms.index'),
            ],
            [
                'label' => __('msg.about'),
                'href' => route('about.index'),
            ],
        ]" />
    </ul>


</aside>
