@props([
    'href' => '#',        // URL tujuan
    'label' => __('msg.back'), // teks tombol/link
    'icon' => 'fas fa-arrow-left', // icon optional
    'class' => '',        // tambahan class CSS
])

<a href="{{ $href }}" class="d-inline-flex align-items-center {{ $class }}">
    @if($icon)
        <i class="{{ $icon }} me-2"></i>
    @endif
    {{ $label }}
</a>
