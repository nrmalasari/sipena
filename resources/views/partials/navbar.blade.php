{{-- ================= NAVBAR PENILAI ================= --}}
<header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-gray-200 bg-white/95 backdrop-blur-sm px-4 sm:px-6 shadow-sm">

    {{-- KIRI: Hamburger + Breadcrumb --}}
    <div class="flex items-center gap-3 min-w-0">

        {{-- ✅ TOMBOL HAMBURGER (muncul di mobile & tablet) --}}
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

    {{-- KANAN: User --}}
    <div class="flex items-center gap-3 flex-shrink-0">

        {{-- User Info + Dropdown --}}
        <div class="relative">
            <button id="userMenuButton"
                    class="flex items-center gap-3 rounded-lg px-2 py-1.5 transition hover:bg-gray-50">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 flex-shrink-0">
                    <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div class="hidden text-left sm:block">
                    <p class="text-sm font-bold text-gray-800 truncate max-w-[160px]">
                        {{ session('nama_penguji', 'Dr. Muhammad Aswad, M.Si') }}
                    </p>
                    <p class="text-xs text-gray-500">
                        @if (session('role') === 'admin')
                            Administrator
                        @else
                            Penguji {{ ucfirst(session('tipe_penguji', 'wawancara')) }}
                        @endif
                    </p>
                </div>
                <svg id="chevronIcon" class="h-4 w-4 text-gray-400 transition-transform duration-200 hidden sm:block"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            {{-- Dropdown --}}
            <div id="userDropdown"
                 class="absolute right-0 top-full mt-2 hidden w-56 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-lg z-50">

                {{-- Header --}}
                <div class="border-b border-gray-100 px-4 py-3">
                    <p class="text-sm font-bold text-gray-800">{{ session('nama_penguji', 'Pengguna') }}</p>
                    <p class="text-xs text-gray-500 truncate">
                        @if (session('role') === 'admin')
                            admin@lanri.go.id
                        @else
                            aswad@lanri.go.id
                        @endif
                    </p>
                </div>

                {{-- Profil Saya --}}
                <a href="{{ route('profil.penguji') }}"
                   class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 transition hover:bg-gray-50">
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Profil Saya
                </a>

                {{-- Pengaturan --}}
                <a href="#"
                   class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 transition hover:bg-gray-50">
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Pengaturan
                </a>

                <div class="border-t border-gray-100"></div>

                {{-- Keluar --}}
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
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userButton = document.getElementById('userMenuButton');
        const dropdown = document.getElementById('userDropdown');
        const chevron = document.getElementById('chevronIcon');

        if (userButton && dropdown) {
            userButton.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
                if (chevron) chevron.classList.toggle('rotate-180');
            });

            document.addEventListener('click', function () {
                dropdown.classList.add('hidden');
                if (chevron) chevron.classList.remove('rotate-180');
            });

            dropdown.addEventListener('click', function (e) {
                if (!e.target.closest('a') && !e.target.closest('button')) {
                    e.stopPropagation();
                }
            });
        }
    });

    function konfirmasiLogoutNavbar() {
        Swal.fire({
            title: 'Keluar dari Aplikasi?',
            text: 'Anda akan keluar dari sesi ini. Yakin ingin melanjutkan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: { popup: 'rounded-2xl' }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formLogoutNavbar').submit();
            }
        });
    }
</script>