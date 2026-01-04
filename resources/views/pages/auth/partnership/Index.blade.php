<x-DashLayout :title="__('msg.partnership')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.partnership') }}" :route="route('partnership.create')" btnLabel="{{ __('msg.add') }}"
            btnColor="bg-warning" />

        <!-- List Partnership -->
        <div class="row g-4">
            @foreach ($partnerships as $item)
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card text-brown shadow-lg border-0 rounded-4 hover-scale h-100 overflow-hidden">

                        <!-- Bagian gambar (full, bukan background) -->
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center p-4"
                            style="height: 180px;">
                            <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->partner_name }}"
                                class="img-fluid" style="max-height: 100%; object-fit: contain;">
                        </div>

                        <!-- Bagian isi -->
                        <div class="card-body">
                            <h5 class="fw-bold mb-1">{{ $item->partner_name }}</h5>

                            @if ($item->website)
                                <p class="mb-2">
                                    <a href="{{ $item->website }}" target="_blank"
                                        class="text-decoration-underline text-primary">
                                        {{ $item->website }}
                                    </a>
                                </p>
                            @endif

                            <div class="d-flex gap-2 flex-wrap mt-3">
                                <x-atoms.button target="editPartnerModal-{{ $item->id }}" icon="fas fa-edit"
                                    label="{{ __('msg.edit') }}" />
                                <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                                    :form="route('partnership.destroy', $item->id)" method="DELETE" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div class="mt-5 text-center">
                {{ $partnerships->links() }}
            </div>
        </div>

        <!-- Modals Edit Partnership -->
        @foreach ($partnerships as $item)
            <x-atoms.modal id="editPartnerModal-{{ $item->id }}"
                title="{{ __('msg.edit') }} {{ __('msg.partnership') }} {{ $item->partner_name }}">
                <form action="{{ route('partnership.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-atoms.text-input label="{{ __('msg.name') }}" type="text" name="partner_name"
                        :value="$item->partner_name" required />
                    <x-atoms.text-input label="Website" type="url" name="website" :value="$item->website" />
                    <x-atoms.image-input label="Logo" name="logo" :value="$item->logo ? asset('storage/' . $item->logo) : null" :uniq="$item->id" />

                    <div class="modal-footer p-0 mt-3">
                        <x-atoms.button type="button" color="secondary"
                            dismiss="true">{{ __('msg.close') }}</x-atoms.button>
                        <x-atoms.button type="submit" color="primary">{{ __('msg.save') }}</x-atoms.button>
                    </div>
                </form>
            </x-atoms.modal>
        @endforeach
    </div>
</x-DashLayout>

@stack('scripts')
