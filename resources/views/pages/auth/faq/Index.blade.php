<x-DashLayout :title="__('msg.faq')">
    <x-atoms.alert />

    <div class="dashboard-collection container py-4">
        <!-- Header -->
        <x-atoms.header-dashboard title="{{ __('msg.faq') }}" :route="route('faq.create')" btnLabel="{{ __('msg.add') }}"
            btnColor="bg-warning" />

        <!-- List FAQ -->
        <div class="list-group mt-3">
            @foreach ($faqs as $item)
                <div class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <h6 class="fw-semibold text-dark mb-2">
                            <i class="fas fa-question-circle text-warning me-2"></i>
                            {{ $item->question }}
                        </h6>
                        <p class="text-muted small mb-0 ps-4">
                            {{ $item->answer }}
                        </p>
                    </div>

                    <div class="d-flex gap-2">
                        <x-atoms.button target="editFaqModal-{{ $item->id }}" icon="fas fa-edit"
                            label="{{ __('msg.edit') }}" color="primary" />
                        <x-atoms.button type="submit" color="danger" icon="fas fa-trash" :confirmDelete="true"
                            :form="route('faq.destroy', $item->id)" method="DELETE" />
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4 text-center">
            {{ $faqs->links() }}
        </div>
    </div>

    <!-- Edit Modals -->
    @foreach ($faqs as $faq)
        <x-atoms.modal id="editFaqModal-{{ $faq->id }}" title="{{ __('msg.edit') }} FAQ">
            <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-atoms.text-input label="{{ __('msg.question') }}" type="text" name="question" :value="$faq->question"
                    required />
                <x-atoms.textarea label="{{ __('msg.answer') }}" id="content-{{ $faq->id }}" name="answer" editor="true">
                    {{ $faq->answer }}
                </x-atoms.textarea>
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
</x-DashLayout>

@stack('scripts')
