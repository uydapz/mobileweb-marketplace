<x-DashLayout :title="__('msg.lookbook')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <form action="{{ route('lookbook.generateQuarterly') }}" method="POST">
            @csrf
            <x-atoms.button color="dark" type="submit">Generate Triwulan Otomatis</x-atoms.button>
        </form>
        <x-atoms.header-dashboard title="{{ __('msg.lookbook') }}" :route="route('lookbook.create')" btnLabel="{{ __('msg.add') }}"
            btnColor="bg-warning" />
        <div class="row">
            @foreach ($lookbooks as $lookbook)
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('storage/' . ($lookbook->cover_image ?? 'images/default.webp')) }}"
                            class="card-img-top" alt="{{ $lookbook->title }}">

                        <div class="card-body">
                            <h5 class="fw-bold">{{ $lookbook->title }}</h5>
                            <p class="text-muted small mb-1">{!! $lookbook->description !!}</p>
                            <small class="text-secondary">
                                {{ \Carbon\Carbon::createFromDate($lookbook->period_year, $lookbook->period_month)->translatedFormat('F Y') }}
                            </small>
                            <div class="d-flex gap-2 mt-3">
                                <form action="{{ route('lookbook.updateCover', $lookbook->id) }}" method="POST"
                                    enctype="multipart/form-data" class="mt-3">
                                    @csrf
                                    @method('PUT')
                                    <x-atoms.image-input label="{{ __('msg.cover_image') }}" name="cover_image" />
                                    <x-atoms.button type="submit" color="warning" class="text-dark w-100">
                                        Ganti Sampul
                                    </x-atoms.button>
                                </form>
                                <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                                    :form="route('lookbook.destroy', $lookbook->id)" method="DELETE" size="sm" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $lookbooks->links() }}
    </div>
</x-DashLayout>
