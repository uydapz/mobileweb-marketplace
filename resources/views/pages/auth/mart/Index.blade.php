<x-DashLayout :title="__('msg.mart')">
    <x-atoms.alert />

    <div class="dashboard-mart container py-4">
        <x-atoms.header-dashboard title="{{ __('msg.mart') }}" />

        @forelse ($marts as $item)
            <div class="border rounded-3 p-3 mb-3 shadow-sm hover-bg-light">
                <div class="row g-3 align-items-start">
                    <!-- Semua Gambar -->
                    <div class="col-12 col-md-3">
                        @php
                            $images = is_array($item->image)
                                ? $item->image
                                : (is_string($item->image)
                                    ? json_decode($item->image, true)
                                    : []);
                        @endphp

                        @if (!empty($images))
                            <div class="d-flex flex-wrap justify-content-start gap-2">
                                @foreach ($images as $img)
                                    <img src="{{ asset('storage/' . $img) }}" alt="{{ $item->product_name }}"
                                        class="rounded border shadow-sm"
                                        style="width: 70px; height: 70px; object-fit: cover;">
                                @endforeach
                            </div>
                        @else
                            <img src="{{ asset('assets/images/no-image.webp') }}" alt="no image"
                                class="rounded border w-100 object-fit-cover" style="max-width: 120px; height: auto;">
                        @endif
                    </div>

                    <!-- Info Produk -->
                    <div class="col-12 col-md-6">
                        <h6 class="mb-1 fw-bold text-dark">{{ $item->product_name }}</h6>
                        <p class="mb-1 text-muted small">{{ $item->collection->name ?? '— No Collection —' }}</p>

                        <div class="d-flex flex-wrap gap-3 small text-muted mb-2">
                            <span><i class="fas fa-tag me-1"></i>Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                            <span class="{{ $item->is_available ? 'text-success' : 'text-danger' }}">
                                {{ $item->is_available ? __('msg.available') : __('msg.unavailable') }}
                            </span>
                        </div>

                        <!-- Semua Ukuran -->
                        @php
                            $sizes = $item->sizes ?? collect();
                        @endphp
                        @if ($sizes->count())
                            <div class="d-flex flex-wrap gap-2 mt-1">
                                @foreach ($sizes as $sz)
                                    <div class="border rounded-pill px-3 py-1 small bg-light">
                                        <strong>{{ strtoupper($sz->size) }}</strong> — {{ $sz->stock }} stok
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Tombol Aksi -->
                    <div
                        class="col-12 col-md-3 d-flex flex-md-column flex-row justify-content-md-end justify-content-start gap-2">
                        <x-atoms.button target="editMartModal-{{ $item->id }}" icon="fas fa-edit"
                            label="{{ __('msg.edit') }}" class="flex-fill" />
                        <x-atoms.button color="danger" icon="fas fa-trash" :confirmDelete="true" :form="route('mart.destroy', $item->id)"
                            method="DELETE" label="{{ __('msg.delete') }}" class="flex-fill" />
                    </div>
                </div>
            </div>
        @empty
            <div class="p-5 text-center text-muted">
                <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                {{ __('No products available in the Mart yet.') }}
            </div>
        @endforelse
    </div>


    <!-- Edit Modal untuk tiap produk -->
    @foreach ($marts as $item)
        <x-atoms.modal id="editMartModal-{{ $item->id }}"
            title="{{ __('msg.edit') }} {{ __('msg.mart') }}: {{ $item->product_name }}">

            <form action="{{ route('mart.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-atoms.select-input label="{{ __('msg.collection') }}" name="collection_id" :options="$collections"
                    :selected="$item->collection_id" required />

                <x-atoms.text-input label="{{ __('msg.product_name') }}" name="product_name" :value="$item->product_name"
                    required />

                <x-atoms.textarea label="{{ __('msg.description') }}" name="description" editor="true">
                    {{ $item->description }}
                </x-atoms.textarea>

                <x-atoms.text-input label="{{ __('msg.price') }}" type="number" name="price" step="0.01"
                    :value="$item->price" required />

                <!-- Ukuran Produk -->
                <label class="form-label fw-semibold mt-3">Ukuran Produk</label>
                <div id="sizeContainer-{{ $item->id }}">
                    @php
                        $sizes = $item->sizes ?? collect();
                    @endphp

                    @forelse ($sizes as $i => $s)
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <input type="text" name="sizes[{{ $i }}][name]" class="form-control w-50"
                                placeholder="Ukuran (misal: M, L, XL)" value="{{ $s->size }}">
                            <input type="number" name="sizes[{{ $i }}][stock]" class="form-control w-25"
                                placeholder="Stok" value="{{ $s->stock }}">
                            <button type="button" class="btn btn-danger btn-sm remove-size">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @empty
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <input type="text" name="sizes[0][name]" class="form-control w-50"
                                placeholder="Ukuran (misal: M)">
                            <input type="number" name="sizes[0][stock]" class="form-control w-25" placeholder="Stok">
                            <button type="button" class="btn btn-danger btn-sm remove-size">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="btn btn-outline-primary btn-sm mt-2 add-size"
                    data-id="{{ $item->id }}">+ Tambah Ukuran</button>

                <!-- Multiple Image Upload -->
                <x-atoms.multi-image-input label="{{ __('msg.image') }}" name="images" :value="$item->image ?? []"
                    :uniq="$item->id" />

                <!-- Status -->
                <div class="form-check mt-3">
                    <input type="checkbox" name="is_available" id="is_available_{{ $item->id }}" value="1"
                        class="form-check-input" {{ $item->is_available ? 'checked' : '' }}>
                    <label for="is_available_{{ $item->id }}" class="form-check-label">
                        {{ __('msg.available') }}
                    </label>
                </div>

                <div class="modal-footer p-0 mt-3">
                    <x-atoms.button type="button" color="secondary" dismiss="true">
                        {{ __('msg.close') }}
                    </x-atoms.button>
                    <x-atoms.button type="submit" color="primary">
                        {{ __('msg.save') }}
                    </x-atoms.button>
                </div>
            </form>
        </x-atoms.modal>
    @endforeach

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Tambah ukuran
                document.querySelectorAll('.add-size').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        const container = document.querySelector(`#sizeContainer-${id}`);
                        const index = container.querySelectorAll('.d-flex').length;

                        const newRow = document.createElement('div');
                        newRow.classList.add('d-flex', 'gap-2', 'align-items-center', 'mb-2');
                        newRow.innerHTML = `
                            <input type="text" name="sizes[${index}][name]" class="form-control w-50" placeholder="Ukuran (misal: XL)">
                            <input type="number" name="sizes[${index}][stock]" class="form-control w-25" placeholder="Stok">
                            <button type="button" class="btn btn-danger btn-sm remove-size"><i class="fas fa-trash"></i></button>
                        `;
                        container.appendChild(newRow);

                        newRow.querySelector('.remove-size').addEventListener('click', () => newRow
                            .remove());
                    });
                });

                // Hapus ukuran
                document.querySelectorAll('.remove-size').forEach(btn => {
                    btn.addEventListener('click', () => btn.closest('.d-flex').remove());
                });
            });
        </script>
    @endpush
</x-DashLayout>
