<x-DashLayout :title="__('msg.language')">
    <x-atoms.header-dashboard title="{{ __('msg.language') }}"/>
    <div class="container py-5">

        @if (session('success'))
            <x-atoms.alert :message="session('success')" type="success" />
        @endif

        <div class="row g-3">
            @foreach (LaravelLocalization::getSupportedLocales() as $code => $locale)
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{ LaravelLocalization::getLocalizedURL($code) }}" class="text-decoration-none">
                        <div
                            class="card text-white bg-brown-soft shadow-sm position-relative h-100 border
                            @if (app()->getLocale() === $code) border-gold @endif
                            hover-scale">

                            {{-- Kris penunjuk untuk bahasa aktif --}}
                            @if (app()->getLocale() === $code)
                                <div class="position-absolute top-0 end-0 p-2 fs-3 text-gold">
                                    🗡️
                                </div>
                            @endif

                            <div class="card-body text-center">
                                <div class="fs-3 mb-2">
                                    @switch($code)
                                        @case('en')
                                            en
                                        @break

                                        @case('id')
                                            id
                                        @break

                                        @case('fr')
                                            fr
                                        @break

                                        @default
                                            🌐
                                    @endswitch
                                </div>
                                <h5 class="card-title">{{ $locale['native'] }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .bg-brown-soft {
            background-color: #461e09;
        }

        .border-gold {
            border-color: #FFD700 !important;
        }

        .text-gold {
            color: #FFD700 !important;
        }

        .card-title {
            color: #fff;
        }

        .hover-scale:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }
    </style>
</x-DashLayout>
