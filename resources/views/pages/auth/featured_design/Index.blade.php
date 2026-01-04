<x-DashLayout :title="__('msg.featured_design')">
    <x-atoms.alert />

    <div class="dashboard-featured container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.featured_design') }}" :route="route('featured-design.create')"
            btnLabel="{{ __('msg.add_featured') }}" btnColor="bg-warning text-dark" />

        <!-- Featured Design Cards -->
        <div class="row g-3 mt-3">
            @forelse($featured as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div
                        class="featured-card bg-light text-dark rounded-4 shadow-sm p-3 position-relative overflow-hidden">
                        <p>{{ $item->theme }}</p>
                        <p class="text-muted small mb-3">
                            {!! Str::limit(strip_tags($item->description), 120) !!}
                        </p>

                        <!-- Footer -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-2">
                                <x-atoms.button target="editFeaturedModal-{{ $item->id }}" icon="fas fa-edit"
                                    label="{{ __('msg.edit') }}" />
                                <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                                    :form="route('featured-design.destroy', $item->id)" method="DELETE" />
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-star fa-2x mb-2 text-secondary"></i><br>
                    {{ __('msg.no_featured') }}
                </div>
            @endforelse

            <!-- Modal Edit -->
            @foreach ($featured as $item)
                <x-atoms.modal id="editFeaturedModal-{{ $item->id }}"
                    title="{{ __('msg.edit') }} {{ __('msg.featured_design') }}">
                    <form action="{{ route('featured-design.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-atoms.text-input label="{{ __('msg.theme') }}" type="text" name="theme"
                            :value="$item->theme" />
                        <x-atoms.textarea label="{{ __('msg.description') }}" id="content-{{ $item->id }}"
                            name="description" editor="true">{{ $item->description }}</x-atoms.textarea>

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
        </div>
    </div>
    <div class="mt-4 text-center">
        {{ $featured->links() }}
    </div>

    <!-- Styles -->
    <style>
        .featured-card {
            background-color: #f9f4ef;
            transition: all 0.3s ease;
        }

        .featured-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(160, 82, 45, 0.2);
        }

        .text-brown {
            color: #8B5E3C;
        }

        .bg-brown-soft {
            background-color: #E5C7A1;
        }

        .badge {
            font-size: 0.8rem;
        }
    </style>
</x-DashLayout>
