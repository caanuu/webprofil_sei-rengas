<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Kantor Lurah Sei Rengas I - Kecamatan Medan Area, Kota Medan, Sumatera Utara">
    <meta name="keywords" content="Kelurahan Sei Rengas I, Medan Area, Pelayanan Publik, Pemerintahan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Kantor Lurah Sei Rengas I')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 text-slate-800">

    {{-- Navigation --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Scroll to Top Button --}}
    <button id="scrollTopBtn" onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="fixed bottom-6 right-6 z-50 hidden w-12 h-12 bg-blue-900 text-white rounded-full shadow-lg hover:bg-blue-800 transition-all duration-300 hover:scale-110 focus:outline-none">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Scroll to top button visibility
        window.addEventListener('scroll', () => {
            const btn = document.getElementById('scrollTopBtn');
            if (window.scrollY > 300) {
                btn.classList.remove('hidden');
            } else {
                btn.classList.add('hidden');
            }
        });

        // Scroll animations
        const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
    </script>

    @stack('scripts')
</body>
</html>
