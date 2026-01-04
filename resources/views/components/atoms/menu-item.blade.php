@props(['icon' => '', 'label' => '', 'href' => '#', 'active' => false, 'target' => null])

<li class="menu-item {{ $active ? 'active' : '' }}">
    <a href="{{ $href }}" class="menu-link" {{ $target ? "target=$target" : '' }}>
        <i class="menu-icon tf-icons {{ $icon }}"></i>
        <div data-i18n="{{ $label }}">{{ $label }}</div>
    </a>
</li>
