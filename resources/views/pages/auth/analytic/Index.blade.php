<x-DashLayout :title="__('Analytic Dashboard')">
    <x-atoms.alert />

    <div class="container py-5">
        <div class="row g-4 mb-4">
            <!-- Summary Cards -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <h6 class="text-muted mb-1">Total Users</h6>
                    <h3 class="fw-bold text-primary">{{ $userTotals->sum() }}</h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <h6 class="text-muted mb-1">Total Collections</h6>
                    <h3 class="fw-bold text-info">{{ $categoryTotals->sum() }}</h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <h6 class="text-muted mb-1">Total Votes</h6>
                    <h3 class="fw-bold text-warning">{{ array_sum($voteTotals) }}</h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <h6 class="text-muted mb-1">Total Events</h6>
                    <h3 class="fw-bold text-danger">{{ $eventLabels->count() }}</h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <h6 class="text-muted mb-1">Partnerships</h6>
                    <h3 class="fw-bold text-success">{{ $totalPartnerships }}</h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm text-center p-3">
                    <h6 class="text-muted mb-1">Tutorials & Docs</h6>
                    <h3 class="fw-bold text-secondary">{{ $totalTutorials + $totalDocs }}</h3>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row g-4">
            <!-- Users -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">User Registrations</h6>
                        <div id="chart-users" style="height:300px;"></div>
                    </div>
                </div>
            </div>

            <!-- Collections -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Collections by Category</h6>
                        <div id="chart-collections" style="height:300px;"></div>
                    </div>
                </div>
            </div>

            <!-- Votes -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Votes per Collection</h6>
                        <div id="chart-votes" style="height:300px;"></div>
                    </div>
                </div>
            </div>

            <!-- Events -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Event Durations</h6>
                        <div id="chart-events" style="height:300px;"></div>
                    </div>
                </div>
            </div>

            <!-- Articles -->
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Articles per Author</h6>
                        <div id="chart-articles" style="height:350px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // === Users ===
            new ApexCharts(document.querySelector("#chart-users"), {
                chart: { type: 'bar', height: 300, toolbar: { show: false } },
                series: [{ name: 'Users', data: @json($userTotals) }],
                xaxis: { categories: @json($months) },
                colors: ['#ffb300']
            }).render();

            // === Collections ===
            new ApexCharts(document.querySelector("#chart-collections"), {
                chart: { type: 'pie', height: 300 },
                series: @json($categoryTotals),
                labels: @json($categoryLabels),
                colors: ['#8e24aa','#f4511e','#3949ab','#00897b','#fdd835']
            }).render();

            // === Votes ===
            new ApexCharts(document.querySelector("#chart-votes"), {
                chart: { type: 'bar', height: 300 },
                series: [{ name: 'Votes', data: @json($voteTotals) }],
                xaxis: { categories: @json($voteLabels) },
                colors: ['#4caf50']
            }).render();

            // === Events ===
            new ApexCharts(document.querySelector("#chart-events"), {
                chart: { type: 'line', height: 300 },
                series: [{ name: 'Duration (days)', data: @json($eventDurations) }],
                xaxis: { categories: @json($eventLabels) },
                colors: ['#ff7043']
            }).render();

            // === Articles ===
            new ApexCharts(document.querySelector("#chart-articles"), {
                chart: { type: 'bar', height: 350 },
                series: [{ name: 'Articles', data: @json($articleTotals) }],
                xaxis: { categories: @json($articleLabels) },
                colors: ['#1e88e5']
            }).render();
        });
    </script>
</x-DashLayout>
