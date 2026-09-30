{{-- ================= SIDEBAR PENILAI ================= --}}

{{-- OVERLAY (muncul saat sidebar terbuka di mobile) --}}
<div id="sidebarOverlay"
     onclick="closeSidebar()"
     class="fixed inset-0 z-40 hidden bg-black/50 backdrop-blur-sm transition-opacity duration-300 lg:hidden">
</div>

{{-- SIDEBAR --}}
<aside id="sidebarPenilai"
       class="fixed left-0 top-0 bottom-0 z-50 flex w-64 flex-col bg-gradient-to-b
              from-blue-950 via-blue-900 to-blue-950 text-white
              transform -translate-x-full transition-transform duration-300 ease-in-out
              lg:translate-x-0">

    {{-- TOMBOL CLOSE (muncul di mobile saja) --}}
    <button type="button"
            onclick="closeSidebar()"
            class="absolute right-3 top-3 flex h-9 w-9 items-center justify-center rounded-lg
                   bg-blue-800/60 text-blue-100 hover:bg-blue-700 hover:text-white transition
                   lg:hidden">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    {{-- LOGO --}}
    <div class="flex items-center gap-3 px-6 py-6 border-b border-blue-800/50">
        <img src="{{ asset('images/logo-lanri.png') }}"
             alt="Logo LAN RI"
             class="h-12 w-auto object-contain flex-shrink-0">
        <div class="min-w-0">
            <h1 class="text-lg font-bold tracking-wide leading-none">LAN RI</h1>
            <p class="mt-1 text-[10px] tracking-[0.2em] text-blue-300 leading-tight">
                MAKARTI BHAKTI<br>NAGARI
            </p>
        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto scrollbar-thin">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard.penguji') }}"
           onclick="handleMenuClick()"
           class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold transition
                  {{ request()->routeIs('dashboard.penguji')
                     ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30'
                     : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
            <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-sm truncate">Dashboard</span>
        </a>

        {{-- Peserta & Penilaian --}}
        <a href="{{ route('peserta.penilaian') }}"
           onclick="handleMenuClick()"
           class="flex items-center gap-3 rounded-lg px-4 py-3 transition
                  {{ request()->routeIs('peserta.penilaian')
                     ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30'
                     : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
            <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="text-sm truncate">Peserta & Penilaian</span>
        </a>

        {{-- ✅ PEDOMAN (dulu Panduan) --}}
        <a href="{{ route('panduan.penguji') }}"
           onclick="handleMenuClick()"
           class="flex items-center gap-3 rounded-lg px-4 py-3 transition
                  {{ request()->routeIs('panduan.penguji')
                     ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30'
                     : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
            <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span class="text-sm truncate">Pedoman</span>
        </a>
    </nav>

    {{-- TOMBOL KELUAR --}}
    <div class="px-4 pb-6">
        <form method="POST" action="{{ route('logout.penguji') }}" id="formLogoutSidebar" class="hidden">
            @csrf
        </form>
        <button type="button"
                onclick="konfirmasiLogoutSidebar()"
                class="flex w-full items-center gap-3 rounded-lg border border-blue-700 px-4 py-3 text-blue-100
                       transition hover:bg-red-600 hover:border-red-600 hover:text-white">
            <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="text-sm font-semibold truncate">Keluar</span>
        </button>
    </div>
</aside>

{{-- ================= JAVASCRIPT SIDEBAR PENILAI ================= --}}
<script>
    function openSidebar() {
        const sidebar = document.getElementById('sidebarPenilai');
        const overlay = document.getElementById('sidebarOverlay');
        if (!sidebar || !overlay) return;
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        const sidebar = document.getElementById('sidebarPenilai');
        const overlay = document.getElementById('sidebarOverlay');
        if (!sidebar || !overlay) return;
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    function handleMenuClick() {
        if (window.innerWidth < 1024) {
            setTimeout(closeSidebar, 150);
        }
    }

    window.addEventListener('resize', function () {
        const sidebar = document.getElementById('sidebarPenilai');
        const overlay = document.getElementById('sidebarOverlay');
        if (!sidebar || !overlay) return;

        if (window.innerWidth >= 1024) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        } else {
            if (overlay.classList.contains('hidden')) {
                sidebar.classList.add('-translate-x-full');
            }
        }
    });

    function konfirmasiLogoutSidebar() {
        Swal.fire({
            title: 'Keluar dari Aplikasi?',
            text: 'Anda akan keluar dari sesi ini. Yakin ingin melanjutkan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formLogoutSidebar').submit();
            }
        });
    }
</script>