@props(['icon' => '', 'label' => '', 'items' => []])

@php
    $groupActive = false;
    foreach ($items as $item) {
        if (request()->url() == ($item['href'] ?? '')) {
            $groupActive = true;
            break;
        }
    }
@endphp

<li class="menu-item {{ $groupActive ? 'active open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons {{ $icon }}"></i>
        <div data-i18n="{{ $label }}">{{ $label }}</div>
    </a>

    <ul class="menu-sub">
        @foreach ($items as $item)
            <x-atoms.menu-item :icon="$item['icon'] ?? ''" :label="$item['label']" :href="$item['href']" :target="$item['target'] ?? null"
                :active="request()->url() == ($item['href'] ?? '')" />
        @endforeach
    </ul>
</li>
