<x-DashLayout :title="__('msg.faq_create')">
    <div class="dashboard-header">
        <x-atoms.header-dashboard title="{{ __('msg.faq') }} / {{ __('msg.add') }} {{ __('msg.faq') }}" />
        <x-atoms.alert />
        <x-atoms.href :href="route('faq.index')" label="{{ __('msg.back') }}" class="text-brown fw-bold" />
    </div>
    <!-- Form -->
    <form action="{{ route('faq.store') }}" method="POST">
        @csrf

        <!-- Question -->
        <x-atoms.text-input label="{{ __('msg.question') }}" placeholder="{{ __('msg.question') }}" type="text"
            name="question" :value="old('question')" required />

        <x-atoms.textarea label="{{ __('msg.answer') }}" name="answer" editor="true">
            {{ old('description') }}
        </x-atoms.textarea>

        <!-- Actions -->
        <div class="mt-4 d-flex justify-content-end gap-2">
            <x-atoms.button type="submit" color="primary">
                <i class="fas fa-save me-1"></i> {{ __('msg.save') }}
            </x-atoms.button>
        </div>
    </form>
</x-DashLayout>
