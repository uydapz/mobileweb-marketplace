<x-HomeLayout :title="__('msg.home')" :banners="$banners">
    @include('components.partials.Partner')
    @include('components.partials.Numbers')
    @include('components.partials.Blog')
    @include('components.partials.PurProm')
    @include('components.partials.Testimoni')
    @include('components.partials.Faqs')
    @include('components.partials.Contact')
</x-HomeLayout>
