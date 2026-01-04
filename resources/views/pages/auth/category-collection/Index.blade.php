<x-DashLayout :title="__('msg.category') . ' ' . __('msg.collection')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard 
            title="{{ __('msg.product') }} / {{ __('msg.category') }} {{ __('msg.collection') }}"
            :route="route('category-collection.create')" 
            btnLabel="{{ __('msg.add') }}" 
            btnColor="bg-warning" 
        />

        <div class="list-group mt-3">
            @foreach ($category_collections as $item)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-semibold text-brown">{{ $item->name }}</span>
                        <small class="text-muted">({{ $item->collections->count() }} {{ __('msg.collection') }})</small>
                    </div>
                    <div class="d-flex gap-2">
                        <x-atoms.button target="editCategoryModal-{{ $item->id }}" icon="fas fa-edit"
                            label="{{ __('msg.edit') }}" color="primary" />
                        <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                            :form="route('category-collection.destroy', $item->id)" method="DELETE" />
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4 text-center">
            {{ $category_collections->links() }}
        </div>
    </div>

    <!-- Edit Modals -->
    @foreach ($category_collections as $category)
        <x-atoms.modal id="editCategoryModal-{{ $category->id }}" title="{{ __('msg.edit') }} {{ $category->name }}">
            <form action="{{ route('category-collection.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-atoms.text-input label="{{ __('msg.name') }}" type="text" name="name" :value="$category->name" required />
                <div class="modal-footer p-0 mt-3">
                    <x-atoms.button type="button" color="secondary" dismiss="true">{{ __('msg.close') }}</x-atoms.button>
                    <x-atoms.button type="submit" color="primary">{{ __('msg.save') }}</x-atoms.button>
                </div>
            </form>
        </x-atoms.modal>
    @endforeach
</x-DashLayout>
@stack('scripts')
