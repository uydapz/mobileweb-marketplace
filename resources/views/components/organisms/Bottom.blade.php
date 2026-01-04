<div class="bottom-nav d-md-flex d-lg-none align-items-center justify-content-between px-4 py-2 shadow-sm">
    <nav class="nav-icons d-flex justify-content-around flex-grow-1 gap-4">
        <a href="#home" id="nav-home" class="nav-icon text-muted text-center" aria-label="Beranda">
            <i id="home-icon" class="fas fa-heading fs-5"></i>
            <div id="home-label" class="nav-label">Header</div>
        </a>
        @if (Route::is('home'))
            <a href="{{ route('voting.index') }}" class="nav-icon mid-icon text-center" aria-label="Voting">
                <div class="mid-btn-wrapper">
                    <i class="fas fa-check-to-slot fs-4"></i>
                    {{-- <span class="mid-count">2/5</span> --}}
                </div>
                <div class="nav-label">Vote</div>
            </a>
        @else
            <a href="{{ route('home') }}" class="nav-icon mid-icon text-center" aria-label="Home">
                <div class="mid-btn-wrapper">
                    <i class="fas fa-home fs-4"></i>
                </div>
                <div class="nav-label">Home</div>
            </a>
        @endif

        <a href="#" class="nav-icon text-muted text-center toggle-menu-btn" aria-label="Menu" id="toggleMenuBtn">
            <i class="fas fa-bars fs-5"></i>
            <div class="nav-label">Menu</div>
        </a>
    </nav>

    <button id="scrollTopBtnMobile" aria-label="Scroll to top" class="scroll-up-btn-mobile shadow"
        style="display:none;">
        <i class="fas fa-arrow-up arrow-icon"></i>
    </button>
</div>

@include('components.organisms.Sidebar')

<!-- Overlay -->
<div id="overlay" class="overlay"></div>

<!-- Scroll Up Button Desktop -->
<button id="scrollToTopBtn" aria-label="Scroll to top" class="scroll-up-btn-desktop shadow" style="display:none;">
    <i class="fas fa-arrow-up arrow-icon"></i>
</button>

<style>
    .mid-btn-wrapper {
        position: relative;
        background: #d4af37;
        color: #000;
        padding: 10px;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        display: inline-flex;
        justify-content: center;
        align-items: center;
        transition: transform 0.2s ease;
    }

    .mid-btn-wrapper:hover {
        transform: scale(1.1);
    }

    .mid-count {
        position: absolute;
        bottom: -6px;
        right: -8px;
        background: #fff;
        color: #000;
        font-size: 0.65rem;
        font-weight: bold;
        padding: 2px 5px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
    }

    .bottom-nav {
        position: fixed;
        bottom: 12px;
        left: 12px;
        right: 12px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        z-index: 1050;
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.5rem 1.5rem;
        backdrop-filter: saturate(180%) blur(8px);
        -webkit-backdrop-filter: saturate(180%) blur(8px);
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .bottom-nav .nav-icons {
        flex-grow: 1;
    }

    .nav-icon {
        flex: 1;
        text-decoration: none;
        color: #6c757d;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        transition: color 0.3s ease;
    }

    .nav-icon:hover,
    .nav-icon:focus {
        color: #a67c35;
    }

    .nav-icon i {
        display: block;
        margin-bottom: 2px;
        font-size: 1.25rem;
        transition: transform 0.3s ease;
    }

    .nav-icon:hover i,
    .nav-icon:focus i {
        transform: translateY(-3px);
    }

    .nav-label {
        font-size: 0.7rem;
        user-select: none;
        color: #000;
    }

    /* Scroll Up Mobile */
    .scroll-up-btn-mobile {
        background: #a67c35;
        border: none;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        cursor: pointer;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 12px rgba(166, 124, 53, 0.6);
        flex-shrink: 0;
    }

    .scroll-up-btn-mobile:hover,
    .scroll-up-btn-mobile:focus {
        background: #cda15e;
        box-shadow: 0 6px 16px rgba(205, 161, 94, 0.8);
        transform: scale(1.1);
    }

    .scroll-up-btn-mobile .arrow-icon {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .scroll-up-btn-mobile:hover .arrow-icon,
    .scroll-up-btn-mobile:focus .arrow-icon {
        transform: translateY(-4px);
    }

    /* Scroll Up Desktop */
    .scroll-up-btn-desktop {
        position: fixed;
        bottom: 32px;
        right: 32px;
        background: #a67c35;
        border: none;
        border-radius: 50%;
        width: 48px;
        height: 48px;
        cursor: pointer;
        color: white;
        display: none;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 16px rgba(166, 124, 53, 0.7);
        transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        z-index: 1100;
    }

    .scroll-up-btn-desktop:hover,
    .scroll-up-btn-desktop:focus {
        background: #cda15e;
        box-shadow: 0 8px 20px rgba(205, 161, 94, 0.9);
        transform: scale(1.1);
    }

    .scroll-up-btn-desktop .arrow-icon {
        font-size: 1.5rem;
        transition: transform 0.3s ease;
    }

    .scroll-up-btn-desktop:hover .arrow-icon,
    .scroll-up-btn-desktop:focus .arrow-icon {
        transform: translateY(-4px);
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease;
        z-index: 1100;
    }

    .overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* Responsive visibility */
    @media (max-width: 991.98px) {
        .scroll-up-btn-desktop {
            display: none !important;
        }

        .bottom-nav {
            display: flex !important;
        }
    }

    @media (min-width: 992px) {
        .bottom-nav {
            display: none !important;
        }

        .scroll-up-btn-desktop {
            display: flex !important;
        }
    }
</style>
<script>
    const sectionData = {
        'partner': {
            icon: 'fas fa-handshake fs-5',
            label: 'Partner'
        },
        'numbers': {
            icon: 'fas fa-chart-line fs-5',
            label: 'Statistik'
        },
        'featured': {
            icon: 'fas fa-star fs-5',
            label: 'Unggulan'
        },
        'purpose': {
            icon: 'fas fa-scroll fs-5',
            label: 'Purpose'
        },
        'testimoni': {
            icon: 'fas fa-comments fs-5',
            label: 'Testimoni'
        },
        'faqs': {
            icon: 'fas fa-question-circle fs-5',
            label: 'FAQ'
        },
        'contact': {
            icon: 'fas fa-envelope fs-5',
            label: 'Kontak'
        },
        'footer': {
            icon: 'fas fa-shoe-prints fs-5',
            label: 'Footer'
        },
        'blog': {
            icon: 'fas fa-newspaper fs-5',
            label: 'Blog'
        },
        'stories': {
            icon: 'fas fa-book-bookmark fs-5',
            label: 'Story'
        },
        'collections': {
            icon: 'fas fa-parachute-box fs-5',
            label: 'Collection'
        },
        'events': {
            icon: 'fas fa-calendar-day fs-5',
            label: 'Event'
        },
        'marts': {
            icon: 'fas fa-shopping-cart fs-5',
            label: 'Marts'
        }
    };

    const homeIcon = document.getElementById('home-icon');
    const homeLabel = document.getElementById('home-label');

    function updateNavOnScroll() {
        let scrollPos = window.scrollY + window.innerHeight / 2;
        let sections = Object.keys(sectionData);

        for (let id of sections) {
            let section = document.getElementById(id);
            if (section) {
                let offsetTop = section.offsetTop;
                let offsetBottom = offsetTop + section.offsetHeight;

                if (scrollPos >= offsetTop && scrollPos < offsetBottom) {
                    homeIcon.className = sectionData[id].icon;
                    homeLabel.textContent = sectionData[id].label;
                    break;
                }
            }
        }
    }

    window.addEventListener('scroll', updateNavOnScroll);
    window.addEventListener('DOMContentLoaded', updateNavOnScroll);
</script>
