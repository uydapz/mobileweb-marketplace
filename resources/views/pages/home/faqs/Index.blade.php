<x-HomeLayout :title="__('msg.faq')" :banners="$banners">
    <section id="faq" class="py-5 bg-light">
        <div class="container">

            {{-- Search bar --}}
            <div class="row justify-content-center mb-4">
                <div class="col-12 col-md-6">
                    <input type="text" id="faqSearch" class="form-control shadow-sm rounded-pill" placeholder="Cari pertanyaan...">
                </div>
            </div>

            @if($faqs->isEmpty())
                <p class="text-center text-muted">{{ __('msg.no_faq_yet') }}</p>
            @else
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $faq)
                        <div class="accordion-item mb-3 shadow-sm rounded-3 border-0">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button collapsed fw-semibold fs-" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                    <span class="text-primary mx-3">XOlovers</span> : {{ $faq->question }} ?
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <strong class="text-success">MinXO :</strong> {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <style>
            /* Accordion button hover */
            .accordion-button {
                font-size: 1rem;
                background: #f8f9fa;
                color: #333;
                transition: background 0.3s, color 0.3s;
            }
            .accordion-button:hover {
                background: #e2e6ea;
            }
            .accordion-button:not(.collapsed) {
                background: #e9ecef;
                color: #000;
            }
            .accordion-body {
                font-size: 0.95rem;
                color: #555;
            }
            /* Search input */
            #faqSearch {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        </style>

        {{-- FAQ Search Script --}}
        <script>
            const searchInput = document.getElementById('faqSearch');
            searchInput.addEventListener('input', function() {
                const filter = this.value.toLowerCase();
                const items = document.querySelectorAll('#faqAccordion .accordion-item');
                items.forEach(item => {
                    const question = item.querySelector('.accordion-button').textContent.toLowerCase();
                    if (question.includes(filter)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        </script>
    </section>
</x-HomeLayout>
