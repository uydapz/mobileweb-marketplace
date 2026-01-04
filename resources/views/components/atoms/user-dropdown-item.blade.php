@props([
    'icon' => null,
    'href' => '#',
    'badge' => null,
])

<li>
    <a class="dropdown-item" href="{{ $href }}">
        <span class="d-flex align-items-center align-middle">
            @if($icon)
                <i class="flex-shrink-0 fa {{ $icon }} me-2"></i>
            @endif

            <span class="flex-grow-1 align-middle">
                {{ $slot }}
            </span>

            {{-- Badge opsional --}}
            @if($badge)
                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">
                    {{ $badge }}
                </span>
            @endif
        </span>
    </a>
</li>
