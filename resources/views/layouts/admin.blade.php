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
<body class="font-sans antialiased bg-slate-100">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('components.admin-sidebar')

        {{-- Main Content --}}
        <div class="flex-1 lg:ml-64">
            {{-- Top Bar --}}
            <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-lg border-b border-slate-200">
                <div class="flex items-center justify-between px-4 lg:px-8 h-16">
                    <div class="flex items-center gap-3">
                        <button id="sidebarToggle" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition">
                            <i class="fas fa-bars text-slate-600"></i>
                        </button>
                        <h1 class="text-lg font-semibold text-slate-800">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex items-center gap-2 text-sm text-slate-600">
                            <i class="fas fa-user-circle text-lg"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="hidden sm:inline">Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="p-4 lg:p-8">
                {{-- Flash Messages --}}
                @if(session('success'))
                    <div id="flashSuccess" class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center gap-3 animate-fade-in">
                        <i class="fas fa-check-circle text-lg"></i>
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="ml-auto text-emerald-400 hover:text-emerald-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center gap-3 animate-fade-in">
                        <i class="fas fa-exclamation-circle text-lg"></i>
                        <span>{{ session('error') }}</span>
                        <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600">
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
