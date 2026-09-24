<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penguji - LAN RI</title>

    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">

    <div class="flex min-h-screen">

        <!-- ================= BAGIAN KIRI (BIRU + AWAN + GEDUNG) ================= -->
        <div class="relative hidden w-1/2 lg:flex flex-col overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-blue-600 p-12 text-white">

            <!-- ============ BACKGROUND AWAN ============ -->
            <!-- Gambar awan sebagai layer paling belakang -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1534088568595-a066f410bcda?w=1200&q=80" 
                     alt="Awan" 
                     class="h-full w-full object-cover object-center opacity-30">
            </div>

            <!-- Overlay biru transparan di atas awan supaya warnanya selaras -->
            <div class="absolute inset-0 z-0 bg-gradient-to-br from-blue-900/90 via-blue-800/80 to-blue-600/70"></div>

            <!-- ============ LOGO LAN RI DI KIRI ATAS ============ -->
            <div class="relative z-20 flex items-center gap-3">
                <img src="{{ asset('images/logo-lanri.png') }}" 
                     alt="Logo LAN RI" 
                     class="h-14 w-auto object-contain">
                <div>
                    <h1 class="text-2xl font-bold tracking-wide leading-none">LAN RI</h1>
                    <p class="mt-1 text-xs tracking-[0.25em] text-blue-200">MAKARTI BHAKTI NAGARI</p>
                </div>
            </div>

            <!-- ============ TEKS JUDUL ============ -->
            <div class="relative z-20 mt-10">
                <h2 class="text-4xl font-bold leading-tight">
                    Sistem Penilaian<br>
                    Calon Peserta<br>
                    Penguji LAN RI
                </h2>
                <p class="mt-6 max-w-md text-blue-100 leading-relaxed">
                    Bersama meningkatkan kualitas aparatur sipil negara untuk Indonesia yang lebih baik.
                </p>
            </div>

            <!-- ============ GAMBAR GEDUNG (BAWAH) ============ -->
            <div class="absolute bottom-0 left-0 right-0 z-10 h-1/2">
                <img src="{{ asset('images/gedung-lanri.png') }}" 
                     alt="Gedung LAN RI" 
                     class="h-full w-full object-cover object-center opacity-95">
                <!-- Overlay gradasi bawah agar transisi mulus -->
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/30 to-transparent"></div>
            </div>

            <!-- ============ ORNAMEN BLUR (AKSEN MERAH & BIRU) ============ -->
            <div class="absolute -bottom-20 -left-20 z-0 h-80 w-80 rounded-full bg-red-600/30 blur-3xl"></div>
            <div class="absolute -bottom-10 left-20 z-0 h-60 w-60 rounded-full bg-blue-400/30 blur-3xl"></div>
        </div>

        <!-- ================= BAGIAN KANAN (FORM LOGIN) ================= -->
        <div class="flex w-full items-center justify-center bg-white p-6 lg:w-1/2">
            <div class="w-full max-w-md">

                <!-- LOGO LAN RI ATAS FORM -->
                <div class="mb-8 flex flex-col items-center text-center">
                    <img src="{{ asset('images/logo-lanri.png') }}" 
                         alt="Logo LAN RI" 
                         class="h-20 w-auto object-contain">
                    <h2 class="mt-3 text-2xl font-bold text-gray-800 leading-none">LAN RI</h2>
                    <p class="mt-1 text-xs tracking-[0.25em] text-gray-500">MAKARTI BHAKTI NAGARI</p>
                </div>

                <!-- IKON USER -->
                <div class="mb-4 flex justify-center">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </div>

                <h3 class="text-center text-2xl font-bold text-gray-800">Login Penguji</h3>
                <p class="mt-2 text-center text-sm text-gray-500">
                    Masuk dengan akun yang telah didaftarkan oleh admin.
                </p>

                <!-- FORM -->
                <form method="POST" action="{{ route('login.penguji.submit') }}" class="mt-8 space-y-5">
                    @csrf

                    <!-- Email / Username -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email / Username</label>
                        <div class="relative mt-2">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input type="text" name="email" id="email" value="{{ old('email') }}"
                                   placeholder="Masukkan email atau username"
                                   class="w-full rounded-lg border border-gray-300 py-3 pl-10 pr-4 text-gray-700 
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative mt-2">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input type="password" name="password" id="password"
                                   placeholder="Masukkan password"
                                   class="w-full rounded-lg border border-gray-300 py-3 pl-10 pr-12 text-gray-700 
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            <button type="button" onclick="togglePassword()" 
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                                <svg id="eye-icon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Ingat Saya & Lupa Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input type="checkbox" name="remember" 
                                   class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            Ingat saya
                        </label>
                        <a href="#" class="text-sm font-semibold text-blue-600 hover:underline">Lupa password?</a>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit"
                            class="w-full rounded-lg bg-blue-600 py-3 text-lg font-semibold text-white 
                                   transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Login
                    </button>
                </form>

                <!-- FOOTER LOGO KECIL -->
                <div class="mt-10 flex items-center justify-center gap-3 border-t border-gray-200 pt-6">
                    <img src="{{ asset('images/logo-lanri.png') }}" 
                         alt="Logo LAN RI" 
                         class="h-12 w-auto object-contain">
                    <div class="text-left">
                        <p class="text-sm font-bold text-gray-700">LAN RI</p>
                        <p class="text-xs text-gray-500 leading-tight">Lembaga Administrasi Negara<br>Republik Indonesia</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
            }
        }
    </script>

</body>
</html>