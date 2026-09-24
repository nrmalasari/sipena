{{-- ================= SIDEBAR ================= --}}
<aside class="fixed left-0 top-0 bottom-0 z-30 hidden w-64 flex-col bg-gradient-to-b from-blue-950 via-blue-900 to-blue-950 text-white lg:flex">

    {{-- LOGO --}}
    <div class="flex items-center gap-3 px-6 py-6 border-b border-blue-800/50">
        <img src="{{ asset('images/logo-lanri.png') }}" 
             alt="Logo LAN RI" 
             class="h-12 w-auto object-contain">
        <div>
            <h1 class="text-lg font-bold tracking-wide leading-none">LAN RI</h1>
            <p class="mt-1 text-[10px] tracking-[0.2em] text-blue-300">MAKARTI BHAKTI NAGARI</p>
        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard.penguji') }}" 
           class="flex items-center gap-3 rounded-lg px-4 py-3 font-semibold transition
                  {{ request()->routeIs('dashboard.penguji') 
                     ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' 
                     : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-sm">Dashboard</span>
        </a>

        {{-- Peserta & Penilaian --}}
        <a href="{{ route('peserta.penilaian') }}" 
           class="flex items-center gap-3 rounded-lg px-4 py-3 transition
                  {{ request()->routeIs('peserta.penilaian') 
                     ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' 
                     : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="text-sm">Peserta & Penilaian</span>
        </a>
    </nav>

    {{-- TOMBOL KELUAR --}}
    <div class="px-4 pb-6">
        <a href="{{ route('login.penguji') }}" 
           class="flex items-center gap-3 rounded-lg border border-blue-700 px-4 py-3 text-blue-100 
                  transition hover:bg-red-600 hover:border-red-600 hover:text-white">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="text-sm font-semibold">Keluar</span>
        </a>
    </div>
</aside>