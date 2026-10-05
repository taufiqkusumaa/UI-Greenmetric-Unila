<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard GreenMetric - Universitas Lampung</title>
  
  <!-- Font & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Plus Jakarta Sans', 'sans-serif'],
          },
          colors: {
            'c-black': '#000000',
            'c-red': '#FF0000',
            'c-slate': '#2F4F4F',
            'c-gold': '#FFD700',
            'c-green': '#008000',
          }
        }
      }
    }
  </script>
</head>
<body class="font-sans text-gray-800 antialiased min-h-screen flex bg-[#EEF2F6]">

  <!-- SIDEBAR KIRI -->
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0 fixed h-full z-20 overflow-y-auto">
    <div class="p-6">
      <div class="flex items-center gap-3 pb-6 border-b border-gray-100">
        <div class="w-10 h-10 rounded-xl bg-c-black flex items-center justify-center text-c-gold shadow-md border-t-2 border-c-gold">
          <i class="fa-solid fa-leaf text-c-gold text-lg"></i>
        </div>
        <div>
          <h2 class="font-bold text-base text-c-black tracking-tight leading-tight">GreenMetric</h2>
          <span class="text-[10px] font-extrabold uppercase tracking-widest text-c-green">UNILA CAMPUS</span>
        </div>
      </div>

      <!-- Menu Section: Utama -->
      <div class="mt-6">
        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">General</p>
        <nav class="space-y-1">
          <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gray-100 text-c-black font-bold text-sm border-l-4 border-c-gold">
            <i class="fa-solid fa-chart-pie text-c-slate"></i> Dashboard
          </a>

          <!-- DROPDOWN 6 KATEGORI DENGAN LINK AKTIF -->
          <div class="relative">
            <button 
              type="button"
              onclick="toggleKategoriMenu()"
              id="btn-kategori"
              class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-c-black font-semibold text-sm transition group"
            >
              <div class="flex items-center gap-3">
                <i class="fa-solid fa-layer-group text-gray-400 group-hover:text-c-black transition-colors"></i>
                <span>6 Kategori</span>
              </div>
              <i id="chevron-kategori" class="fa-solid fa-chevron-down text-xs text-gray-400 transition-transform duration-200"></i>
            </button>

            <!-- Submenu Masing-Masing Indikator -->
            <div id="menu-kategori" class="hidden mt-1 pl-3 pr-1 py-1.5 space-y-1 bg-gray-50/80 rounded-xl border border-gray-100">
              <a href="{{ route('indikator.show', 'si') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium text-gray-600 hover:bg-white hover:text-c-black transition group">
                <span class="truncate">Setting & Infra</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-c-black text-c-gold">SI</span>
              </a>
              <a href="{{ route('indikator.show', 'ec') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium text-gray-600 hover:bg-white hover:text-c-black transition group">
                <span class="truncate">Energy & Climate</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-c-black text-c-gold">EC</span>
              </a>
              <a href="{{ route('indikator.show', 'ws') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium text-gray-600 hover:bg-white hover:text-c-black transition group">
                <span class="truncate">Waste Management</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-c-black text-c-gold">WS</span>
              </a>
              <a href="{{ route('indikator.show', 'wr') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium text-gray-600 hover:bg-white hover:text-c-black transition group">
                <span class="truncate">Water Conservation</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-c-black text-c-gold">WR</span>
              </a>
              <a href="{{ route('indikator.show', 'tr') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium text-gray-600 hover:bg-white hover:text-c-black transition group">
                <span class="truncate">Transportation</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-c-black text-c-gold">TR</span>
              </a>
              <a href="{{ route('indikator.show', 'ed') }}" class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs font-medium text-gray-600 hover:bg-white hover:text-c-black transition group">
                <span class="truncate">Education & Research</span>
                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-c-green text-white">ED</span>
              </a>
            </div>
          </div>

      <div class="mt-6">
        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">Peralatan Data</p>
        <nav class="space-y-1">
          <a href="{{ route('submission.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-500 hover:bg-gray-50 text-sm font-medium transition">
            <i class="fa-solid fa-paper-plane"></i> Input Capaian Baru
          </a>
        </nav>
      </div>
    </div>

    <!-- Banner Bawah -->
    <div class="p-4 m-4 rounded-2xl bg-c-slate text-white border-b-4 border-c-gold shrink-0">
      <div class="flex items-center gap-1.5 text-c-gold text-xs font-bold mb-1">
        <i class="fa-solid fa-shield-halved"></i> Target 2026
      </div>
      <p class="text-xs text-gray-200 mb-3 leading-snug">Menuju Kampus Berkelanjutan Top 10 Indonesia.</p>
      <a href="{{ route('submission.index') }}" class="block text-center w-full py-2 bg-c-black hover:bg-black/80 text-c-gold font-bold text-xs rounded-lg transition border border-c-gold/30">
        Ajukan Data Baru
      </a>
    </div>
  </aside>

  <!-- KONTEN UTAMA -->
  <main class="flex-1 ml-64 p-8">
    <header class="flex items-center justify-between pb-8">
      <div>
        <h1 class="text-2xl font-bold text-c-black">Dashboard Pengukuran Kampus Hijau</h1>
        <p class="text-xs text-gray-500 mt-1">Pemantauan metrik UI GreenMetric Universitas Lampung.</p>
      </div>
      <div class="flex items-center gap-4">
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

    <!-- 5 STATS CARDS -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Ranking UNILA</span>
          <i class="fa-solid fa-trophy text-c-gold"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['rank'] }}</div>
        <div class="mt-2 text-[11px] font-bold text-c-green"><i class="fa-solid fa-arrow-trend-up"></i> +2 Posisi</div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm border-t-2 border-t-c-gold">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Skor Saat Ini</span>
          <i class="fa-solid fa-chart-line text-c-green"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['current_score'] }}</div>
        <div class="mt-2 text-[11px] font-bold text-c-green"><i class="fa-solid fa-arrow-trend-up"></i> +5.4% kenaikan</div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Target Capaian</span>
          <i class="fa-solid fa-bullseye text-c-red"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['target_score'] }}</div>
        <div class="mt-2 text-[11px] text-gray-400">Selisih 695 poin</div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Total Indikator</span>
          <i class="fa-solid fa-list text-c-slate"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['total_indicators'] }}</div>
        <div class="mt-2 text-[11px] text-gray-400">6 Kategori Penuh</div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Data Verified</span>
          <i class="fa-solid fa-circle-check text-c-green"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['verified_data'] }}</div>
        <div class="mt-2 text-[11px] font-bold text-amber-600"><i class="fa-solid fa-clock"></i> 9 Proses Review</div>
      </div>
    </section>

    <!-- QUICK ACTIONS MENGHUBUNGKAN KE SUBMISI -->
    <section class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-6">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h3 class="font-bold text-sm text-c-black">Aksi Cepat Tim Kerja</h3>
          <p class="text-xs text-gray-400">Pengisian dan monitoring data indikator keberlanjutan.</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <a href="{{ route('submission.index') }}" class="p-4 rounded-xl bg-amber-50 border border-c-gold/30 hover:shadow-md transition flex items-center gap-3 group">
          <div class="w-10 h-10 rounded-lg bg-c-gold text-c-black flex items-center justify-center font-bold">
            <i class="fa-solid fa-file-pen text-sm"></i>
          </div>
          <div>
            <h4 class="font-bold text-xs text-c-black group-hover:text-amber-800">Form Submisi Data</h4>
            <p class="text-[11px] text-gray-500">Kirim data & tautan dokumen bukti</p>
          </div>
        </a>

        <a href="{{ route('indikator.show', 'ec') }}" class="p-4 rounded-xl bg-emerald-50 border border-c-green/20 hover:shadow-md transition flex items-center gap-3 group">
          <div class="w-10 h-10 rounded-lg bg-c-green text-white flex items-center justify-center font-bold">
            <i class="fa-solid fa-bolt text-sm"></i>
          </div>
          <div>
            <h4 class="font-bold text-xs text-c-black group-hover:text-c-green">Fokus Audit EC</h4>
            <p class="text-[11px] text-gray-500">Bobot terbesar kampus (21.00%)</p>
          </div>
        </a>

        <a href="{{ route('indikator.show', 'si') }}" class="p-4 rounded-xl bg-slate-100 border border-c-slate/20 hover:shadow-md transition flex items-center gap-3 group">
          <div class="w-10 h-10 rounded-lg bg-c-slate text-c-gold flex items-center justify-center font-bold">
            <i class="fa-solid fa-tree text-sm"></i>
          </div>
          <div>
            <h4 class="font-bold text-xs text-c-black group-hover:text-c-slate">Ruang Hijau (SI)</h4>
            <p class="text-[11px] text-gray-500">Evaluasi tata kelola kawasan UNILA</p>
          </div>
        </a>
      </div>
    </section>

    <!-- BAR CHART 6 KATEGORI INTERAKTIF -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
      <div class="lg:col-span-8 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between mb-4">
            <div>
              <h3 class="font-bold text-base text-c-black">Perkembangan Skor Per Kategori</h3>
              <p class="text-xs text-gray-400">Klik pilar untuk menuju rincian indikator masing-masing</p>
            </div>
            <div class="flex items-center gap-2">
              <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-gray-500">
                <span class="w-2.5 h-2.5 rounded-full bg-c-gold"></span> Skor Capaian
              </span>
              <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-gray-500 ml-2">
                <span class="w-2.5 h-2.5 rounded-full bg-c-slate"></span> Standar UI
              </span>
            </div>
          </div>

          <div class="h-56 flex items-end justify-between gap-4 pt-8 px-4 border-b border-gray-100">
            @foreach($categoriesChart as $cat)
            <a href="{{ route('indikator.show', $cat['route']) }}" class="flex-1 flex flex-col items-center gap-2 group cursor-pointer" title="Klik lihat detail {{ $cat['name'] }}">
              <div class="w-full flex items-end justify-center gap-1 h-44 group-hover:scale-105 transition-transform">
                <div class="w-1/2 bg-c-slate rounded-t-md" style="height: {{ $cat['target_height'] }};"></div>
                <div class="w-1/2 bg-c-gold rounded-t-md group-hover:bg-amber-400 transition" style="height: {{ $cat['score_height'] }};"></div>
              </div>
              <span class="text-[10px] font-bold text-gray-500 group-hover:text-c-black">{{ $cat['code'] }}</span>
            </a>
            @endforeach
          </div>
        </div>
        <div class="mt-4 flex items-center justify-between text-xs text-gray-500 pt-2">
          <span>Pilih salah satu kategori di atas untuk melihat dokumen dan sub-indikator.</span>
        </div>
      </div>

      <!-- Feed Aktivitas -->
      <div class="lg:col-span-4 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between">
        <div>
          <h3 class="font-bold text-base text-c-black mb-4">Aktivitas Submisi</h3>
          <div class="space-y-4">
            @foreach($activities as $act)
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-full {{ $act['color'] }} flex items-center justify-center font-bold text-xs shrink-0">
                {{ $act['badge'] }}
              </div>
              <div>
                <p class="text-xs font-bold text-c-black">{{ $act['faculty'] }}</p>
                <p class="text-[11px] text-gray-500 leading-tight">{{ $act['desc'] }}</p>
                <span class="text-[10px] text-gray-400 mt-1 block">{{ $act['time'] }}</span>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="mt-6 p-3 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-between">
          <span class="text-xs font-medium text-gray-600">Total Berkas: 124 Data</span>
          <a href="{{ route('submission.index') }}" class="px-3 py-1 bg-c-black text-c-gold text-xs font-bold rounded-lg hover:bg-c-slate transition">
            Isi Baru
          </a>
        </div>
      </div>
    </div>
  </main>

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