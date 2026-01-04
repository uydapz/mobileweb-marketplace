<x-DashLayout :title="__('msg.collection')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.product') }} / {{ __('msg.collection') }}" :route="route('collection.create')"
            btnLabel="{{ __('msg.add') }}" btnColor="bg-warning" />

        <!-- List Koleksi -->
        <div class="row g-4">
            @foreach ($collections as $item)
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card text-brown shadow-lg border-0 rounded-4 hover-scale h-100 p-4"
                        style="background: linear-gradient(to right, rgba(253,246,240,0.95) 40%, rgba(253,246,240,0) 100%), 
                        url('{{ asset('storage/' . $item->image) }}') center/cover no-repeat;">
                        <h5 class="fw-bold mb-1">{{ $item->name }}</h5>
                        <p class="mb-1"><small>{{ __('msg.category') }}: {{ $item->category->name ?? '' }}</small></p>
                        <p class="mb-1"><small>{{ __('msg.featured_design') }}: {{ $item->featuredDesign->theme ?? '' }}</small></p>
                        <div class="d-flex gap-2 flex-wrap mt-3">
                            <x-atoms.button target="editKoleksiModal-{{ $item->id }}" icon="fas fa-edit"
                                label="{{ __('msg.edit') }}" />
                            <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                                :form="route('collection.destroy', $item->id)" method="DELETE" />
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Pagination -->
            <div class="mt-5 text-center">
                {{ $collections->links() }}
            </div>
        </div>

        @foreach ($collections as $item)
            <x-atoms.modal id="editKoleksiModal-{{ $item->id }}"
                title="{{ __('msg.edit') }} {{ __('msg.collection') }} {{ $item->name }}">
                <form action="{{ route('collection.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-atoms.text-input label="{{ __('msg.name') }}" type="text" name="name" :value="$item->name"
                        required />
                    <x-atoms.select-input label="{{ __('msg.category') }}" name="category_id" :options="$category_collections"
                        :selected="$item->category_id ?? old('category_id')" />
                    <x-atoms.select-input label="{{ __('msg.featured_design') }}" name="featured_design_id" :options="$featured_designs"
                        :selected="$item->featured_design_id ?? old('featured_design_id')" />
                    <x-atoms.textarea label="{{ __('msg.description') }}" id="content-{{ $item->id }}" name="description" editor="true">
                        {{ $item->description }}
                    </x-atoms.textarea>
                    <x-atoms.image-input label="{{ __('msg.image') }}" name="image" :value="$item->image ? asset('storage/' . $item->image) : null"
                        :uniq="$item->id" />
                    <div class="modal-footer p-0 mt-3">
                        <x-atoms.button type="button" color="secondary"
                            dismiss="true">{{ __('msg.close') }}</x-atoms.button>
                        <x-atoms.button type="submit" color="primary">{{ __('msg.save') }}</x-atoms.button>
                    </x-atoms.modal>
                    </div>
                </form>
        @endforeach
    </div>
</x-DashLayout>
@stack('scripts')
