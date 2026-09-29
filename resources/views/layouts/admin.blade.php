<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - LAN RI')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .scrollbar-thin::-webkit-scrollbar { height: 6px; width: 6px; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up { animation: fadeInUp 0.5s ease-out forwards; opacity: 0; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        .swal2-popup { border-radius: 1rem !important; font-family: 'Inter', sans-serif !important; }
        .swal2-confirm, .swal2-cancel {
            border-radius: 0.5rem !important;
            font-weight: 600 !important;
            padding: 0.625rem 1.5rem !important;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-100 min-h-screen">

    {{-- SIDEBAR ADMIN --}}
    @include('partials.sidebar-admin')

    {{-- MAIN CONTENT — margin kiri hanya di desktop --}}
    <main class="lg:ml-64 min-h-screen flex flex-col transition-all duration-300">

        {{-- NAVBAR --}}
        @include('partials.navbar-admin')

        {{-- ISI HALAMAN --}}
        <div class="flex-1 p-4 sm:p-6">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>