@props(['user' => null, 'size' => 'w-px-40 h-auto'])

@php
    $avatarUser = $user ?? Auth::user();
    $src = $avatarUser && $avatarUser->avatar 
           ? $avatarUser->avatar 
           : asset('assets/img/avatars/default.png');
@endphp
<div class="avatar avatar-online">
    <img src="{{ $src }}" class="{{ $size }} rounded-circle" />
</div>
