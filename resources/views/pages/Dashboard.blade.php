<x-DashLayout :title="'Beranda'">
    <div class="container py-4">
        <div class="row g-4">

            <!-- Welcome -->
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 p-4 d-flex flex-row align-items-center justify-content-between">
                    <div>
                        <h4 class="text-primary mb-2">Hai, {{ Auth::user()->name }} 😎</h4>
                        <p class="text-muted mb-0">
                            {!! __('msg.welcome_message') !!}
                        </p>
                    </div>
                    <img src="{{ asset('assets/images/resources/MinXO-okey.webp') }}" height="110" alt="Welcome">
                </div>
            </div>

            @if (Auth::user()->role == 1)
                <!-- Statistik Kecil -->
                @foreach ([['Total Users', $stats['users'], 'text-primary'], ['Total Collections', $stats['collections'], 'text-info'], ['Total Votes', $stats['votes'], 'text-warning'], ['Total Events', $stats['events'], 'text-danger']] as [$label, $value, $color])
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <h6 class="text-muted mb-1">{{ $label }}</h6>
                            <h3 class="fw-bold {{ $color }}">{{ $value }}</h3>
                        </div>
                    </div>
                @endforeach

                <!-- Charts -->
                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm p-3">
                        <h6 class="text-muted mb-3">📈 Pertumbuhan User per Bulan</h6>
                        <div id="chart-users" style="height: 300px;"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-3">
                        <h6 class="text-muted mb-3">🎨 Koleksi per Kategori</h6>
                        <div id="chart-categories" style="height: 300px;"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-3">
                        <h6 class="text-muted mb-3">🗳️ Vote per Koleksi</h6>
                        <div id="chart-votes" style="height: 300px;"></div>
                    </div>
                </div>

        </div>
    </div>

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const months = @json($months);
            const userTotals = @json($userTotals);
            const catLabels = @json($catLabels);
            const catTotals = @json($catTotals);
            const voteLabels = @json($voteLabels);
            const voteTotals = @json($voteTotals);

            new ApexCharts(document.querySelector("#chart-users"), {
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Users',
                    data: userTotals
                }],
                xaxis: {
                    categories: months
                },
                colors: ['#4e73df']
            }).render();

            new ApexCharts(document.querySelector("#chart-categories"), {
                chart: {
                    type: 'pie',
                    height: 300
                },
                series: catTotals,
                labels: catLabels,
                colors: ['#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796']
            }).render();

            new ApexCharts(document.querySelector("#chart-votes"), {
                chart: {
                    type: 'line',
                    height: 300
                },
                series: [{
                    name: 'Votes',
                    data: voteTotals
                }],
                xaxis: {
                    categories: voteLabels
                },
                colors: ['#fd7e14']
            }).render();
        });
    </script>
    @endif
</x-DashLayout>
