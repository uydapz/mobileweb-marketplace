@props([
    'title' => 'Judul Halaman',
    'route' => '#',
    'btnLabel' => null,
    'btnColor' => '',
    'btnIcon' => 'fas fa-plus',
])

<div class="d-flex justify-content-between align-items-center mb-4">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> {{ $title }}</h6>

    @if ($btnLabel)
        <a href="{{ $route }}" class="fw-bold shadow-sm px-4 py-2 rounded-3 d-flex align-items-center badge text-dark {{ $btnColor }}" style="transition: transform 0.2s ease;">
            @if ($btnIcon)
                <i class="{{ $btnIcon }} me-2"></i>
            @endif
            {{ $btnLabel }}
        </a>
    @endif
</div>
