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

  <!-- SIDEBAR KIRI -->
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0 fixed h-full z-20">
    <div class="p-6">
      <!-- Identitas Brand / Logo -->
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
          <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-c-black font-semibold text-sm transition">
            <i class="fa-solid fa-layer-group"></i> 6 Kategori
          </a>
          <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-c-black font-semibold text-sm transition">
            <i class="fa-solid fa-award"></i> Ranking Nasional
          </a>
          <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-c-black font-semibold text-sm transition">
            <i class="fa-solid fa-list-check"></i> Submisi Bukti
          </a>
        </nav>
      </div>

      <!-- Menu Section: Alat -->
      <div class="mt-6">
        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3">Peralatan Data</p>
        <nav class="space-y-1">
          <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-500 hover:bg-gray-50 text-sm font-medium transition">
            <i class="fa-solid fa-file-invoice"></i> Rekap Nilai
          </a>
          <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-500 hover:bg-gray-50 text-sm font-medium transition">
            <i class="fa-solid fa-sliders"></i> Audit Emisi
          </a>
        </nav>
      </div>
    </div>

    <!-- Banner Info Bawah -->
    <div class="p-4 m-4 rounded-2xl bg-c-slate text-white border-b-4 border-c-gold">
      <div class="flex items-center gap-1.5 text-c-gold text-xs font-bold mb-1">
        <i class="fa-solid fa-shield-halved"></i> Target 2026
      </div>
      <p class="text-xs text-gray-200 mb-3 leading-snug">Menuju Kampus Berkelanjutan Top 10 Indonesia.</p>
      <button class="w-full py-2 bg-c-black hover:bg-black/80 text-c-gold font-bold text-xs rounded-lg transition border border-c-gold/30">
        Panduan Verifikasi
      </button>
    </div>
  </aside>

  <!-- KONTEN UTAMA (KANAN) -->
  <main class="flex-1 ml-64 p-8">
    
    <!-- Top Header -->
    <header class="flex items-center justify-between pb-8">
      <div>
        <h1 class="text-2xl font-bold text-c-black">Dashboard Pengukuran Kampus Hijau</h1>
        <p class="text-xs text-gray-500 mt-1">Pemantauan metrik UI GreenMetric terintegrasi.</p>
      </div>
      <div class="flex items-center gap-4">
        <div class="relative">
          <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
          <input type="text" placeholder="Cari kriteria, dokumen..." class="pl-9 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-xs w-64 focus:outline-none focus:border-c-slate shadow-sm">
        </div>
        <button class="w-9 h-9 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-gray-50 relative">
          <i class="fa-regular fa-bell text-sm"></i>
          <span class="w-2 h-2 rounded-full bg-c-red absolute top-2 right-2"></span>
        </button>
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
      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Ranking UNILA</span>
          <i class="fa-solid fa-trophy text-c-gold"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['rank'] }}</div>
        <div class="mt-2 flex items-center gap-1 text-[11px] font-bold text-c-green">
          <i class="fa-solid fa-arrow-trend-up"></i> +2 Posisi
        </div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition border-t-2 border-t-c-gold">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Skor Saat Ini</span>
          <i class="fa-solid fa-chart-line text-c-green"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['current_score'] }}</div>
        <div class="mt-2 flex items-center gap-1 text-[11px] font-bold text-c-green">
          <i class="fa-solid fa-arrow-trend-up"></i> +5.4% kenaikan
        </div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Target Capaian</span>
          <i class="fa-solid fa-bullseye text-c-red"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['target_score'] }}</div>
        <div class="mt-2 text-[11px] font-medium text-gray-400">
          Selisih 695 poin
        </div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Total Indikator</span>
          <i class="fa-solid fa-list text-c-slate"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['total_indicators'] }}</div>
        <div class="mt-2 text-[11px] font-medium text-gray-400">
          6 Kategori Penuh
        </div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between text-gray-400 text-xs font-semibold mb-2">
          <span>Data Verified</span>
          <i class="fa-solid fa-circle-check text-c-green"></i>
        </div>
        <div class="text-3xl font-extrabold text-c-black">{{ $stats['verified_data'] }}</div>
        <div class="mt-2 flex items-center gap-1 text-[11px] font-bold text-amber-600">
          <i class="fa-solid fa-clock"></i> 9 Proses Review
        </div>
      </div>
    </section>

    <!-- QUICK ACTIONS -->
    <section class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-6">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h3 class="font-bold text-sm text-c-black">Aksi Cepat Tim Kerja</h3>
          <p class="text-xs text-gray-400">Akses modul pengisian bukti dukung secara cepat.</p>
        </div>
        <span class="text-xs text-gray-400 cursor-pointer"><i class="fa-solid fa-ellipsis"></i></span>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="p-4 rounded-xl bg-amber-50 border border-c-gold/30 hover:shadow-sm cursor-pointer transition flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-c-gold/30 text-c-black flex items-center justify-center font-bold">
            <i class="fa-solid fa-upload text-sm"></i>
          </div>
          <div>
            <h4 class="font-bold text-xs text-c-black">Upload Dokumen</h4>
            <p class="text-[11px] text-gray-500">Unggah berkas bukti</p>
          </div>
        </div>

        <div class="p-4 rounded-xl bg-emerald-50 border border-c-green/20 hover:shadow-sm cursor-pointer transition flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-c-green/20 text-c-green flex items-center justify-center font-bold">
            <i class="fa-solid fa-calculator text-sm"></i>
          </div>
          <div>
            <h4 class="font-bold text-xs text-c-black">Simulasi Skor</h4>
            <p class="text-[11px] text-gray-500">Kalkulasi bobot</p>
          </div>
        </div>

        <div class="p-4 rounded-xl bg-slate-100 border border-c-slate/20 hover:shadow-sm cursor-pointer transition flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-c-slate text-c-gold flex items-center justify-center font-bold">
            <i class="fa-solid fa-users-gear text-sm"></i>
          </div>
          <div>
            <h4 class="font-bold text-xs text-c-black">Validasi Pokja</h4>
            <p class="text-[11px] text-gray-500">Cek berkas fakultas</p>
          </div>
        </div>

        <div class="p-4 rounded-xl bg-red-50 border border-c-red/20 hover:shadow-sm cursor-pointer transition flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-c-red/20 text-c-red flex items-center justify-center font-bold">
            <i class="fa-solid fa-file-pdf text-sm"></i>
          </div>
          <div>
            <h4 class="font-bold text-xs text-c-black">Cetak Laporan</h4>
            <p class="text-[11px] text-gray-500">Format submisi UI</p>
          </div>
        </div>
      </div>
    </section>

    <!-- GRID DUA KOLOM: DIAGRAM PERKEMBANGAN & AKTIVITAS -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
      
      <!-- Grafik 6 Pilar -->
      <div class="lg:col-span-8 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between mb-4">
            <div>
              <h3 class="font-bold text-base text-c-black">Perkembangan Skor Per Kategori</h3>
              <p class="text-xs text-gray-400">Pencapaian skor pada 6 pilar GreenMetric</p>
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

          <!-- Batang Diagram Dinamis -->
          <div class="h-56 flex items-end justify-between gap-4 pt-8 px-4 border-b border-gray-100">
            @foreach($categoriesChart as $cat)
            <div class="flex-1 flex flex-col items-center gap-2">
              <div class="w-full flex items-end justify-center gap-1 h-44">
                <div class="w-1/2 bg-c-slate rounded-t-md" style="height: {{ $cat['target_height'] }};"></div>
                <div class="w-1/2 bg-c-gold rounded-t-md" style="height: {{ $cat['score_height'] }};"></div>
              </div>
              <span class="text-[10px] font-bold text-gray-500">{{ $cat['code'] }}</span>
            </div>
            @endforeach
          </div>
        </div>

        <div class="mt-4 flex items-center justify-between text-xs text-gray-500 pt-2">
          <span>Kategori ED (Education & Research) mencatat progres tertinggi.</span>
          <a href="#" class="font-bold text-c-black hover:text-c-green">Detail Analisis &rarr;</a>
        </div>
      </div>

      <!-- Feed Aktivitas Verifikasi -->
      <div class="lg:col-span-4 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between">
        <div>
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-base text-c-black">Aktivitas Submisi</h3>
            <span class="text-xs text-gray-400"><i class="fa-solid fa-ellipsis"></i></span>
          </div>

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
          <span class="text-xs font-medium text-gray-600">Total Berkas: 124 File</span>
          <button class="px-3 py-1 bg-c-black text-c-gold text-xs font-bold rounded-lg hover:bg-c-slate transition">
            Periksa
          </button>
        </div>
      </div>
    </div>

    <!-- TABEL BENCHMARKING NASIONAL -->
    <section class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-6">
      <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <div>
          <h3 class="font-bold text-base text-c-black">Top Universitas Nasional</h3>
          <p class="text-xs text-gray-400">Komparasi capaian nilai agregat GreenMetric</p>
        </div>
        <button class="px-4 py-2 border border-gray-200 rounded-xl text-xs font-bold text-gray-600 hover:bg-gray-50 transition">
          Filter Wilayah
        </button>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead class="bg-c-slate text-white border-b-2 border-c-gold">
            <tr>
              <th class="py-3.5 px-6 font-bold">Rank</th>
              <th class="py-3.5 px-6 font-bold">Nama Institusi</th>
              <th class="py-3.5 px-6 font-bold">Negara</th>
              <th class="py-3.5 px-6 font-bold text-center">Status Audit</th>
              <th class="py-3.5 px-6 font-bold text-right">Skor Total</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 font-medium">
            @foreach($benchmarks as $row)
            <tr class="hover:bg-gray-50 transition {{ $row['is_current'] ? 'bg-amber-50/60 font-semibold' : '' }}">
              <td class="py-3 px-6 font-extrabold text-c-black">{{ $row['rank'] }}</td>
              <td class="py-3 px-6 text-c-black flex items-center gap-2">
                <span>{{ $row['name'] }}</span>
                @if($row['is_current'])
                <span class="px-2 py-0.5 rounded bg-c-gold text-c-black text-[9px] font-black uppercase">Anda</span>
                @endif
              </td>
              <td class="py-3 px-6 text-gray-500">{{ $row['country'] }}</td>
              <td class="py-3 px-6 text-center">
                @if($row['status'] === 'VERIFIED')
                <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-c-green font-extrabold text-[10px]">VERIFIED</span>
                @else
                <span class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-800 font-extrabold text-[10px]">IN REVIEW</span>
                @endif
              </td>
              <td class="py-3 px-6 text-right font-extrabold {{ $row['is_current'] ? 'text-c-black' : 'text-c-green' }}">
                {{ $row['score'] }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

  </main>

</body>
</html>