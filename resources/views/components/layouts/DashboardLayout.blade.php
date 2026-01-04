<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('adsets/') }}/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ __('msg.dashboard') }} {{ __('msg.ndexo') }} | {{ $title ?? '' }}</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/webp" href="{{ asset('assets/images/logos/favicon.webp') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logos/favicon.webp') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('adsets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('adsets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    {{-- <link rel="stylesheet" href="{{ asset('adsets/css/demo.css') }}" /> --}}

    <link rel="stylesheet" href="{{ asset('adsets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('adsets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('adsets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('adsets/js/config.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('components.organisms.auth.Sidebar')

            <div class="layout-page">
                @include('components.organisms.auth.Navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        {{ $slot }}
                    </div>
                    @include('components.organisms.auth.Footer')

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="{{ asset('adsets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('adsets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('adsets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('adsets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('adsets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('adsets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('adsets/js/main.js') }}"></script>
    <script src="{{ asset('adsets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @stack('scripts')
</body>

</html>
