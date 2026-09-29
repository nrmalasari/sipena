{{-- ================= NAVBAR ADMIN ================= --}}
<header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-gray-200 bg-white/95 backdrop-blur-sm px-4 sm:px-6 shadow-sm">

    {{-- KIRI: Hamburger + Breadcrumb --}}
    <div class="flex items-center gap-3 min-w-0">

        {{-- TOMBOL HAMBURGER (muncul di mobile & tablet) --}}
        <button type="button"
                onclick="openSidebar()"
                class="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300
                       bg-white text-gray-700 transition hover:bg-gray-100 active:scale-95
                       lg:hidden flex-shrink-0"
                aria-label="Buka Menu">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm min-w-0 overflow-hidden">
            @yield('breadcrumb')
        </nav>
    </div>

    {{-- KANAN: User Menu + Dropdown --}}
    <div class="relative flex-shrink-0">
        <button type="button"
                id="adminMenuButton"
                class="flex items-center gap-3 rounded-lg px-2 py-1.5 transition hover:bg-gray-50">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 flex-shrink-0">
                <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                </svg>
            </div>
            <div class="hidden text-left sm:block">
                <p class="text-sm font-bold text-gray-800">{{ session('nama_penguji', 'Admin') }}</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>
            <svg id="adminChevron" class="h-4 w-4 text-gray-400 transition-transform duration-200 hidden sm:block"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        {{-- ✅ DROPDOWN MENU (yang tadinya hilang) --}}
        <div id="adminDropdown"
             class="absolute right-0 top-full mt-2 hidden w-56 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-lg z-50">

            {{-- Header (user info) --}}
            <div class="border-b border-gray-100 px-4 py-3">
                <p class="text-sm font-bold text-gray-800 truncate">
                    {{ session('nama_penguji', 'Administrator') }}
                </p>
                <p class="text-xs text-gray-500 truncate">
                    admin@lanri.go.id
                </p>
            </div>

            {{-- Menu: Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 transition hover:bg-gray-50">
                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            {{-- Menu: Pengaturan --}}
            <a href="{{ route('admin.pengaturan') }}"
               class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 transition hover:bg-gray-50">
                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Pengaturan
            </a>

            <div class="border-t border-gray-100"></div>

            {{-- Menu: Keluar --}}
            <form method="POST" action="{{ route('logout.penguji') }}" id="formLogoutNavbar" class="hidden">
                @csrf
            </form>
            <button type="button"
                    onclick="konfirmasiLogoutNavbar()"
                    class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-red-600 transition hover:bg-red-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Keluar
            </button>
        </div>
    </div>
</header>

{{-- ================= SCRIPT NAVBAR ================= --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('adminMenuButton');
        const dropdown = document.getElementById('adminDropdown');
        const chevron = document.getElementById('adminChevron');

        if (!btn || !dropdown) return;

        // Toggle dropdown saat tombol diklik
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
            if (chevron) chevron.classList.toggle('rotate-180');
        });

        // Tutup dropdown saat klik di luar
        document.addEventListener('click', function(e) {
            if (!dropdown.classList.contains('hidden')) {
                if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                    if (chevron) chevron.classList.remove('rotate-180');
                }
            }
        });

        // Tutup dropdown saat tekan Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                dropdown.classList.add('hidden');
                if (chevron) chevron.classList.remove('rotate-180');
            }
        });
    });

    function konfirmasiLogoutNavbar() {
        Swal.fire({
            title: 'Keluar dari Aplikasi?',
            text: 'Anda akan keluar dari sesi admin.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formLogoutNavbar').submit();
            }
        });
    }
</script>