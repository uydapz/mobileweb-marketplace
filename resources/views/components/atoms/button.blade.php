@props([
    'type' => 'button',
    'color' => 'primary',
    'icon' => '',
    'label' => '',
    'form' => '',
    'method' => 'POST',
    'confirmDelete' => false,
    'target' => '',
    'dismiss' => '',
    'link' => '',
    'chat' => false,
    'login' => false,
    'logout' => false,
])

{{-- ✅ FORM BUTTON (bisa delete/submit dengan confirm) --}}
@if ($form)
    <form method="POST" action="{{ $form }}" class="{{ $confirmDelete ? 'confirm-delete' : '' }}">
        @csrf
        @if (strtoupper($method) !== 'POST')
            @method($method)
        @endif
        <button type="{{ $type }}" class="badge bg-{{ $color }} border-0 d-inline-flex align-items-center">
            @if ($icon)
                <i class="{{ $icon }} me-1"></i>
            @endif
            {{ $label ?: $slot }}
        </button>
    </form>

    {{-- ✅ MODAL TARGET --}}
@elseif ($target)
    <button type="button" class="badge bg-{{ $color }} border-0 d-inline-flex align-items-center"
        data-bs-toggle="modal" data-bs-target="#{{ $target }}">
        @if ($icon)
            <i class="{{ $icon }} me-1"></i>
        @endif
        {{ $label ?: $slot }}
    </button>

    {{-- ✅ DISMISS MODAL --}}
@elseif ($dismiss)
    <button type="button" class="badge bg-{{ $color }} border-0" data-bs-dismiss="modal">
        {{ $label ?: $slot }}
    </button>

    {{-- ✅ CHAT / LINK BUTTON --}}
@elseif ($chat || $link)
    <button type="button" class="badge bg-{{ $color }} border-0 d-inline-flex align-items-center"
        onclick="window.location.href='{{ $link }}'">
        @if ($icon)
            <i class="{{ $icon }} me-1"></i>
        @endif
        {{ $label ?: $slot }}
    </button>

    {{-- ✅ LOGIN BUTTON --}}
@elseif ($login)
    <button type="submit" class="btn btn-{{ $color }}">
        @if ($icon)
            <i class="{{ $icon }} me-1"></i>
        @endif
        {{ $label ?: $slot }}
    </button>

    {{-- ✅ LOGOUT BUTTON --}}
@elseif ($logout)
    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="badge bg-danger border-0 d-inline-flex align-items-center">
            @if ($icon)
                <i class="{{ $icon }} me-1"></i>
            @endif
            {{ $label ?: $slot }}
        </button>
    </form>

    {{-- ✅ DEFAULT BUTTON --}}
@else
    <button type="{{ $type }}" class="badge bg-{{ $color }} border-0 d-inline-flex align-items-center">
        @if ($icon)
            <i class="{{ $icon }} me-1"></i>
        @endif
        {{ $label ?: $slot }}
    </button>
@endif

{{-- ✅ DELETE CONFIRMATION SCRIPT --}}
@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.confirm-delete').forEach(function(form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Hapus data?',
                            text: "Data yang dihapus tidak bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#a67c52',
                            cancelButtonColor: '#8b5e3c',
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) form.submit();
                        });
                    });
                });
            });
        </script>
    @endpush
@endonce
