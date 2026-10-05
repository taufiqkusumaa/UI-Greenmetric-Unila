<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $item['code'] }} - {{ $item['title'] }} | GreenMetric UNILA</title>
  
  <!-- Font & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Tailwind CSS CDN dengan Definisi Warna Spesifik -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
          colors: {
            'c-black': '#000000',      /* RGB: 00 00 00 */
            'c-red': '#FF0000',        /* RGB: FF 00 00 */
            'c-slate': '#2F4F4F',      /* RGB: 2F 4F 4F */
            'c-gold': '#FFD700',       /* RGB: FF D7 00 */
            'c-green': '#008000',      /* RGB: 00 80 00 */
          }
        }
      }
    }
  </script>
</head>
<body class="font-sans text-gray-800 antialiased min-h-screen flex bg-[#EEF2F6]">

  <!-- SIDEBAR KIRI (SERAGAM DENGAN DASHBOARD UTAMA) -->
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0 fixed h-full z-20 overflow-y-auto">
    <div class="p-6">
      <!-- Identitas Brand / Logo -->
      <div class="flex items-center gap-3 pb-6 border-b border-gray-100">
        <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-xl bg-c-black flex items-center justify-center text-c-gold shadow-md border-t-2 border-c-gold">
          <i class="fa-solid fa-leaf text-c-gold text-lg"></i>
        </a>
        <div>
          <h2 class="font-bold text-base text-c-black tracking-tight leading-tight">GreenMetric</h2>
          <span class="text-[10px] font-extrabold uppercase tracking-widest text-c-green">UNILA CAMPUS</span>
        </div>
      </div>

      <!-- Menu Section: Utama -->
      <div class="mt-6">
        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">General</p>
        <nav class="space-y-1">
          <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-c-black font-semibold text-sm transition">
            <i class="fa-solid fa-chart-pie text-gray-400"></i> Dashboard
          </a>

          <!-- DROPDOWN 6 KATEGORI DENGAN LINK AKTIF -->
          <div class="relative">
            <button 
              type="button"
              onclick="toggleKategoriMenu()"
              id="btn-kategori"
              class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl bg-gray-50 text-c-black font-bold text-sm transition group border-l-4 border-c-gold"
            >
              <div class="flex items-center gap-3">
                <i class="fa-solid fa-layer-group text-c-slate transition-colors"></i>
                <span>6 Kategori</span>
              </div>
              <i id="chevron-kategori" class="fa-solid fa-chevron-down text-xs text-gray-400 rotate-180 transition-transform duration-200"></i>
            </button>

            <!-- Submenu Masing-Masing Indikator (Otomatis Terbuka di Halaman Indikator) -->
            <div id="menu-kategori" class="mt-1 pl-3 pr-1 py-1.5 space-y-1 bg-gray-50/80 rounded-xl border border-gray-100">
              <a href="{{ route('indikator.show', 'si') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium transition {{ strtolower($item['code']) === 'si' ? 'bg-white text-c-black font-bold shadow-sm' : 'text-gray-600 hover:bg-white hover:text-c-black' }}">
                <span class="truncate">Setting & Infra</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded {{ strtolower($item['code']) === 'si' ? 'bg-c-gold text-c-black' : 'bg-c-black text-c-gold' }}">SI</span>
              </a>
              <a href="{{ route('indikator.show', 'ec') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium transition {{ strtolower($item['code']) === 'ec' ? 'bg-white text-c-black font-bold shadow-sm' : 'text-gray-600 hover:bg-white hover:text-c-black' }}">
                <span class="truncate">Energy & Climate</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded {{ strtolower($item['code']) === 'ec' ? 'bg-c-gold text-c-black' : 'bg-c-black text-c-gold' }}">EC</span>
              </a>
              <a href="{{ route('indikator.show', 'ws') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium transition {{ strtolower($item['code']) === 'ws' ? 'bg-white text-c-black font-bold shadow-sm' : 'text-gray-600 hover:bg-white hover:text-c-black' }}">
                <span class="truncate">Waste Management</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded {{ strtolower($item['code']) === 'ws' ? 'bg-c-gold text-c-black' : 'bg-c-black text-c-gold' }}">WS</span>
              </a>
              <a href="{{ route('indikator.show', 'wr') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium transition {{ strtolower($item['code']) === 'wr' ? 'bg-white text-c-black font-bold shadow-sm' : 'text-gray-600 hover:bg-white hover:text-c-black' }}">
                <span class="truncate">Water Conservation</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded {{ strtolower($item['code']) === 'wr' ? 'bg-c-gold text-c-black' : 'bg-c-black text-c-gold' }}">WR</span>
              </a>
              <a href="{{ route('indikator.show', 'tr') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium transition {{ strtolower($item['code']) === 'tr' ? 'bg-white text-c-black font-bold shadow-sm' : 'text-gray-600 hover:bg-white hover:text-c-black' }}">
                <span class="truncate">Transportation</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded {{ strtolower($item['code']) === 'tr' ? 'bg-c-gold text-c-black' : 'bg-c-black text-c-gold' }}">TR</span>
              </a>
              <a href="{{ route('indikator.show', 'ed') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium transition {{ strtolower($item['code']) === 'ed' ? 'bg-white text-c-black font-bold shadow-sm' : 'text-gray-600 hover:bg-white hover:text-c-black' }}">
                <span class="truncate">Education & Research</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded {{ strtolower($item['code']) === 'ed' ? 'bg-c-gold text-c-black' : 'bg-c-green text-white' }}">ED</span>
              </a>
            </div>
          </div>

          <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-c-black font-semibold text-sm transition">
            <i class="fa-solid fa-award text-gray-400"></i> Ranking Nasional
          </a>
          <a href="{{ route('submission.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-c-black font-semibold text-sm transition">
            <i class="fa-solid fa-list-check text-gray-400"></i> Submisi Bukti
          </a>
        </nav>
      </div>

      <!-- Menu Section: Alat -->
      <div class="mt-6">
        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">Peralatan Data</p>
        <nav class="space-y-1">
          <a href="{{ route('submission.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-500 hover:bg-gray-50 text-sm font-medium transition">
            <i class="fa-solid fa-file-invoice text-gray-400"></i> Rekap Nilai
          </a>
          <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-500 hover:bg-gray-50 text-sm font-medium transition">
            <i class="fa-solid fa-sliders text-gray-400"></i> Audit Emisi
          </a>
        </nav>
      </div>
    </div>

    <!-- Banner Info Bawah -->
    <div class="p-4 m-4 rounded-2xl bg-c-slate text-white border-b-4 border-c-gold shrink-0">
      <div class="flex items-center gap-1.5 text-c-gold text-xs font-bold mb-1">
        <i class="fa-solid fa-shield-halved"></i> Target 2026
      </div>
      <p class="text-xs text-gray-200 mb-3 leading-snug">Menuju Kampus Berkelanjutan Top 10 Indonesia.</p>
      <a href="{{ route('submission.index') }}" class="block text-center w-full py-2 bg-c-black hover:bg-black/80 text-c-gold font-bold text-xs rounded-lg transition border border-c-gold/30">
        Panduan Verifikasi
      </a>
    </div>
  </aside>

  <!-- KONTEN UTAMA INDIKATOR -->
  <main class="flex-1 ml-64 p-8">
    
    <!-- Top Header & Breadcrumb -->
    <header class="flex items-center justify-between pb-6">
      <div class="flex items-center gap-2 text-xs font-semibold text-gray-400">
        <a href="{{ route('dashboard') }}" class="hover:text-c-black transition">Dashboard</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <span class="text-c-slate font-bold">6 Kategori</span>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <span class="text-c-black font-extrabold">{{ $item['code'] }}</span>
      </div>

      <div class="flex items-center gap-4">
        <div class="relative">
          <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
          <input type="text" placeholder="Cari sub-indikator..." class="pl-9 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-xs w-64 focus:outline-none focus:border-c-slate shadow-sm">
        </div>
        <div class="flex items-center gap-3 pl-2 border-l border-gray-200">
          <div class="w-9 h-9 rounded-xl bg-c-black text-c-gold flex items-center justify-center font-bold text-xs border border-c-gold">
            UN
          </div>
          <div>
            <p class="text-xs font-bold text-c-black leading-none">Tim Pokja</p>
            <p class="text-[10px] text-gray-400">UNILA</p>
          </div>
        </div>
      </div>
    </header>

    <!-- Banner Utama Indikator -->
    <section class="bg-c-black text-white rounded-3xl p-8 border-b-4 border-c-gold mb-8 relative overflow-hidden shadow-sm">
      <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-c-slate text-c-gold text-xs font-extrabold uppercase tracking-wider mb-3 border border-c-gold/30">
            <i class="fa-solid {{ $item['icon'] }}"></i> Kategori UI GreenMetric
          </div>
          <h1 class="text-3xl font-extrabold tracking-tight">{{ $item['title'] }}</h1>
          <p class="text-sm text-gray-300 mt-2 max-w-2xl leading-relaxed">{{ $item['summary'] }}</p>
          
          <div class="mt-4 flex items-center gap-2 text-xs text-gray-400">
            <i class="fa-solid fa-user-tie text-c-gold"></i>
            <span>Koordinator Pokja: <strong class="text-white">{{ $item['pic'] }}</strong></span>
          </div>
        </div>

        <div class="bg-c-slate/90 p-6 rounded-2xl border border-c-gold/40 text-center shrink-0 min-w-[170px]">
          <span class="text-[11px] font-bold uppercase tracking-wider text-c-gold">Bobot Kategori</span>
          <div class="text-3xl font-black text-white mt-1">{{ $item['weight'] }}</div>
          <span class="text-[10px] text-gray-300">Standar Internasional</span>
        </div>
      </div>
    </section>

    <!-- Daftar Sub-Indikator -->
    <section class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8">
      <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
        <div>
          <h2 class="text-lg font-bold text-c-black">Rincian Sub-Indikator {{ $item['code'] }}</h2>
          <p class="text-xs text-gray-400">Metrik pencapaian dan target terverifikasi tingkat universitas.</p>
        </div>
        <a href="{{ route('submission.index') }}" class="px-4 py-2 bg-c-black hover:bg-c-slate text-c-gold font-bold text-xs rounded-xl transition border border-c-gold/40 flex items-center gap-2 shadow-sm">
          <i class="fa-solid fa-paper-plane"></i> Submisi Data {{ $item['code'] }}
        </a>
      </div>

      <div class="space-y-4">
        @foreach($item['sub_indicators'] as $sub)
        <div class="p-5 rounded-xl border border-gray-100 bg-gray-50/70 hover:bg-white hover:shadow-md transition flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="flex items-start gap-4">
            <span class="w-12 h-10 rounded-lg bg-c-black text-c-gold font-bold text-xs flex items-center justify-center shrink-0 border border-c-gold/30">
              {{ $sub['code'] }}
            </span>
            <div>
              <h3 class="text-sm font-bold text-c-black">{{ $sub['name'] }}</h3>
              <p class="text-xs text-gray-400 mt-1">Target Institusi: <span class="font-semibold text-gray-700">{{ $sub['target'] }}</span></p>
            </div>
          </div>

          <div class="flex items-center gap-3 self-end md:self-auto">
            <span class="px-3 py-1.5 rounded-lg bg-emerald-50 text-c-green border border-c-green/20 text-xs font-bold">
              <i class="fa-solid fa-check-circle mr-1"></i> {{ $sub['status'] }}
            </span>
          </div>
        </div>
        @endforeach
      </div>
    </section>

  </main>

  <!-- JAVASCRIPT UNTUK TOGGLE DROPDOWN -->
  <script>
    function toggleKategoriMenu() {
      const menu = document.getElementById('menu-kategori');
      const chevron = document.getElementById('chevron-kategori');
      const btn = document.getElementById('btn-kategori');

      if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
        chevron.classList.add('rotate-180');
        btn.classList.add('text-c-black', 'bg-gray-50');
      } else {
        menu.classList.add('hidden');
        chevron.classList.remove('rotate-180');
        btn.classList.remove('text-c-black', 'bg-gray-50');
      }
    }
  </script>

</body>
</html>