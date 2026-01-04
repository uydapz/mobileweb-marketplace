@props([
    'title' => 'Or sign in with',
    'buttons' => [
        ['provider' => 'google', 'color' => 'text-red-500', 'hover' => 'hover:bg-red-50', 'icon' => 'fab fa-google', 'url' => '#'],
        ['provider' => 'facebook', 'color' => 'text-blue-600', 'hover' => 'hover:bg-blue-50', 'icon' => 'fab fa-facebook-f', 'url' => '#'],
    ]
])

<div class="social-login mt-8 text-center">
    <p class="text-gray-500 text-sm relative">
        <span class="px-2 bg-white relative z-10">{{ $title }}</span>
        <span class="absolute top-1/2 left-0 right-0 h-px bg-gray-200 -z-0"></span>
    </p>
    <div class="social-icons flex justify-center gap-4 mt-4">
        @foreach ($buttons as $btn)
            <a href="{{ $btn['url'] }}"
               class="social-icon {{ $btn['hover'] }} {{ $btn['color'] }} flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 shadow-sm">
                <i class="{{ $btn['icon'] }}"></i>
            </a>
        @endforeach
    </div>
</div>
