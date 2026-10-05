<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UI GreenMetric UNILA - Advancing Sustainability')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-black': '#000000',
                        'brand-slate': '#2F4F4F',
                        'brand-gold': '#FFD700',
                        'brand-green': '#008000',
                        'brand-red': '#FF0000',
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased selection:bg-brand-gold selection:text-black">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-brand-black flex items-center justify-center text-brand-gold font-extrabold text-xl shadow-md border-t-2 border-brand-gold">
                    <i class="fa-solid fa-leaf text-brand-gold"></i>
                </div>
                <div>
                    <span class="block font-serif font-bold text-xl tracking-tight text-brand-black leading-none">GreenMetric</span>
                    <span class="text-[10px] tracking-widest text-brand-green uppercase font-bold">Universitas Lampung</span>
                </div>
            </a>
            
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-gray-600">
                <a href="#about" class="hover:text-brand-green transition-colors">Tentang Kami</a>
                <a href="#kategori" class="hover:text-brand-green transition-colors">6 Kategori</a>
                <a href="#" class="hover:text-brand-green transition-colors">Peringkat</a>
                <a href="#tim" class="hover:text-brand-green transition-colors">Tim Ahli</a>
            </nav>

            <a href="#kategori" class="bg-brand-black text-white text-sm font-semibold px-6 py-2.5 rounded-full hover:bg-brand-slate transition-all shadow hover:shadow-lg border-b-2 border-brand-gold">
                Lihat Indikator &rarr;
            </a>
        </div>
    </header>

    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-black text-white pt-16 pb-8 border-t-4 border-brand-gold">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-brand-slate flex items-center justify-center text-brand-gold text-lg">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <span class="font-serif font-bold text-xl text-white tracking-wide">GreenMetric UNILA</span>
                </div>
                <p class="text-gray-400 text-sm max-w-md leading-relaxed mb-6">
                    Mewujudkan ekosistem kampus hijau berkelanjutan melalui pengukuran, riset aplikatif, dan implementasi nyata berbasis indikator UI GreenMetric World University Rankings.
                </p>
                <div class="flex gap-4 text-gray-400">
                    <span class="text-xs px-3 py-1 bg-brand-slate text-brand-gold rounded font-medium border-l-2 border-brand-red">Target Net-Zero 2030</span>
                </div>
            </div>
            <div>
                <h4 class="text-xs font-bold text-brand-gold uppercase tracking-wider mb-4">Navigasi Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#about" class="hover:text-white transition-colors">Tentang Program</a></li>
                    <li><a href="#kategori" class="hover:text-white transition-colors">6 Indikator Penilaian</a></li>
                    <li><a href="#peringkat" class="hover:text-white transition-colors">Benchmarking Nasional</a></li>
                    <li><a href="#tim" class="hover:text-white transition-colors">Struktur Organisasi Tim</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xs font-bold text-brand-gold uppercase tracking-wider mb-4">Kontak Sekretariat</h4>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Gedung Rektorat UNILA Lt. 3<br>
                    Jl. Prof. Dr. Sumantri Brojonegoro No. 1<br>
                    Bandar Lampung, 35145<br>
                    <span class="text-brand-gold">greenmetric@unila.ac.id</span>
                </p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 border-t border-gray-900 pt-6 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} UI GreenMetric Universitas Lampung. Seluruh hak cipta dilindungi undang-undang.
        </div>
    </footer>

</body>
</html>
