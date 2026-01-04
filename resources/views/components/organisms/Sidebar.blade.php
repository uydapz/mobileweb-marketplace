<div id="sidebarMenu" class="sidebar-menu">
    <button id="closeSidebar" class="close-btn" aria-label="Close sidebar">&times;</button>
    <nav class="menu-nav">
        <!-- Eksplorasi -->
        @auth
        <a href="/dashboard" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-gauge"></i>
            </div>
            <span class="label">Dashboard</span>
        </a>
        @endauth
        @guest
        <a href="{{ route('login') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-door-open"></i>
            </div>
            <span class="label">Login</span>
        </a>
        @endguest
        <a href="{{ route('collections.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-tshirt"></i>
            </div>
            <span class="label">Koleksi</span>
        </a>
        <a href="{{ route('lookbooks.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-camera-retro"></i>
            </div>
            <span class="label">Lookbook</span>
        </a>
        <a href="{{ route('stories.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-feather-alt"></i>
            </div>
            <span class="label">Cerita</span>
        </a>
        <a href="{{ route('blog.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-newspaper"></i>
            </div>
            <span class="label">Artikel</span>
        </a>

        <!-- Interaksi -->
        <a href="{{ route('events.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-calendar-alt"></i>
            </div>
            <span class="label">Event</span>
        </a>
        <a href="{{ route('testimonis.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-comment"></i>
            </div>
            <span class="label">Testimoni</span>
        </a>
        <a href="{{ route('faqs.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-question-circle"></i>
            </div>
            <span class="label">FAQ</span>
        </a>
        <a href="{{ route('contacts.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-comments"></i>
            </div>
            <span class="label">Hubungi Kami</span>
        </a>
        <a href="{{ route('marts.index') }}" class="menu-item">
            <div class="icon-box">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <span class="label">Marts</span>
        </a>
    </nav>
</div>


<style>
    .sidebar-menu {
        position: fixed;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100vh;
        background: linear-gradient(135deg, #e0e0e0e3, #ffffffa2);
        padding: 2.5rem 2rem;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.25);
        transition: left 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1200;
        display: flex;
        flex-direction: column;
    }


    .sidebar-menu.open {
        left: 0;
    }

    .sidebar-menu .close-btn {
        background: transparent;
        border: none;
        font-size: 2.8rem;
        color: #ffffff;
        cursor: pointer;
        align-self: flex-end;
        margin-bottom: 3rem;
        transition: color 0.3s ease;
    }

    .sidebar-menu .close-btn:hover {
        color: #6c5522;
    }

    .sidebar-menu .menu-nav {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* 3 kolom */
        gap: 1.5rem;
        padding: 0 1rem;
        justify-items: center;
    }

    .menu-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        user-select: none;
    }

    .icon-box {
        background: rgba(255 255 255 / 0.35);
        backdrop-filter: blur(6px);
        width: 56px;
        height: 56px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        color: #b1945e;
        font-size: 1.8rem;
    }

    .menu-item:hover .icon-box,
    .menu-item:focus .icon-box {
        background: rgba(255 255 255 / 0.6);
        box-shadow: 0 6px 20px rgba(166, 124, 53, 0.5);
        color: #a67c35;
        transform: translateY(-4px);
    }

    .label {
        margin-top: 0.4rem;
        font-size: 0.75rem;
        font-weight: 600;
        color: #070707;
        text-align: center;
        transition: color 0.3s ease;
    }

    .menu-item:hover .label,
    .menu-item:focus .label {
        color: #a67c35;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const scrollBtnMobile = document.getElementById('scrollTopBtnMobile');
        const scrollBtnDesktop = document.getElementById('scrollToTopBtn');

        if (!scrollBtnMobile || !scrollBtnDesktop) return;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                scrollBtnMobile.style.display = 'flex';
                scrollBtnDesktop.style.display = 'flex';
            } else {
                scrollBtnMobile.style.display = 'none';
                scrollBtnDesktop.style.display = 'none';
            }
        });

        scrollBtnMobile.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        scrollBtnDesktop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Sidebar toggle
        const toggleBtn = document.getElementById('toggleMenuBtn');
        const sidebar = document.getElementById('sidebarMenu');
        const overlay = document.getElementById('overlay');
        const closeBtn = document.getElementById('closeSidebar');

        function openMenu() {
            sidebar.classList.add('open');
            overlay.classList.add('active');
        }

        function closeMenu() {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        }

        toggleBtn.addEventListener('click', e => {
            e.preventDefault();
            openMenu();
        });

        closeBtn.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);
    });
</script>
