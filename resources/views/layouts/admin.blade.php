<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Kantor Lurah Sei Rengas I</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-800">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('components.admin-sidebar')

        {{-- Main Content Area --}}
        <div class="flex-1 lg:ml-64 flex flex-col min-w-0">
            {{-- Top Bar --}}
            <header class="sticky top-0 z-30 bg-white/90 backdrop-blur-md border-b border-slate-200">
                <div class="flex items-center justify-between px-4 lg:px-8 h-16">
                    <div class="flex items-center gap-3">
                        <button id="sidebarToggle" class="lg:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100 transition">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div>
                            <h1 class="text-base sm:text-lg font-extrabold text-slate-900 tracking-tight leading-tight">
                                @yield('page-title', 'Dashboard')
                            </h1>
                            <p class="text-[11px] text-slate-400 font-medium hidden sm:block">Panel Kontrol Kelurahan Sei Rengas I</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <span>{{ auth()->user()->name ?? 'Administrator' }}</span>
                        </div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-rose-600 hover:bg-rose-50 rounded-xl transition border border-rose-200">
                                <i class="fas fa-right-from-bracket"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Page Content Body --}}
            <main class="p-4 sm:p-6 lg:p-8 flex-1">
                {{-- Flash Messages --}}
                @if(session('success'))
                    <div id="flashSuccess" class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3 shadow-sm">
                        <i class="fas fa-circle-check text-emerald-600 text-lg"></i>
                        <span class="text-xs sm:text-sm font-medium">{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="ml-auto text-emerald-500 hover:text-emerald-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl flex items-center gap-3 shadow-sm">
                        <i class="fas fa-circle-exclamation text-rose-600 text-lg"></i>
                        <span class="text-xs sm:text-sm font-medium">{{ session('error') }}</span>
                        <button onclick="this.parentElement.remove()" class="ml-auto text-rose-500 hover:text-rose-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Sidebar Toggle Script --}}
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const sidebarToggle = document.getElementById('sidebarToggle');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        }

        if (sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', toggleSidebar);

        // Auto-hide flash message
        setTimeout(() => {
            const flash = document.getElementById('flashSuccess');
            if (flash) flash.style.display = 'none';
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>
