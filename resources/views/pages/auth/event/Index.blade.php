<x-DashLayout :title="__('msg.event')">
    <x-atoms.alert />

    <div class="container py-4">
        <x-atoms.header-dashboard 
            title="{{ __('msg.event') }}" 
            :route="route('event.create')" 
            btnLabel="{{ __('msg.add') }}" 
            btnColor="bg-warning" 
        />

        @if ($events->count())
            <div class="row g-4 mt-3">
                @foreach ($events as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm rounded-4 h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="fw-bold text-dark">{{ $item->title }}</h5>
                                    <p class="text-muted small mb-1">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y H:i') }}
                                        @if ($item->end_date)
                                            – {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y H:i') }}
                                        @endif
                                    </p>
                                    <p class="text-secondary mb-2">
                                        <i class="fas fa-map-marker-alt me-1"></i> {{ $item->location ?? '-' }}
                                    </p>
                                    @if ($item->description)
                                        <p class="small text-muted">{{ Str::limit($item->description, 100) }}</p>
                                    @endif
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                    <x-atoms.button target="editEventModal-{{ $item->id }}" icon="fas fa-edit"
                                        label="{{ __('msg.edit') }}" color="primary" size="sm" />
                                    <x-atoms.button type="submit" color="danger" icon="fas fa-trash"
                                        :confirmDelete="true" :form="route('event.destroy', $item->id)" method="DELETE"
                                        size="sm" />
                                </div>
                            </div>
                        </div>

                        {{-- Modal Edit --}}
                        <x-atoms.modal id="editEventModal-{{ $item->id }}" title="Edit Event">
                            <form action="{{ route('event.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <x-atoms.text-input label="Judul Event" name="title" :value="$item->title" required />
                                <x-atoms.textarea label="Deskripsi" id="content-{{ $item->id }}" name="description">{{ $item->description }}</x-atoms.textarea>
                                <x-atoms.text-input label="Tanggal Mulai" type="datetime-local" 
                                    name="start_date" :value="$item->start_date" required />
                                <x-atoms.text-input label="Tanggal Selesai" type="datetime-local" 
                                    name="end_date" :value="$item->end_date" />
                                <x-atoms.text-input label="Lokasi" name="location" :value="$item->location" />

                                <div class="modal-footer p-0 mt-3">
                                    <x-atoms.button type="button" color="secondary" dismiss="true">{{ __('msg.close') }}</x-atoms.button>
                                    <x-atoms.button type="submit" color="primary">{{ __('msg.save') }}</x-atoms.button>
                                </div>
                            </form>
                        </x-atoms.modal>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted py-5">
                <i class="fas fa-calendar-times fa-3x mb-3"></i>
                <p class="mb-0">Belum ada event.</p>
            </div>
        @endif
    </div>
</x-DashLayout>
