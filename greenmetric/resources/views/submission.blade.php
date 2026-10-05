<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submisi Data Capaian - UI GreenMetric UNILA</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
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

  <!-- SIDEBAR -->
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0 fixed h-full z-20">
    <div class="p-6">
      <div class="flex items-center gap-3 pb-6 border-b border-gray-100">
        <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-xl bg-c-black flex items-center justify-center text-c-gold shadow-md border-t-2 border-c-gold">
          <i class="fa-solid fa-leaf text-c-gold text-lg"></i>
        </a>
        <div>
          <h2 class="font-bold text-base text-c-black tracking-tight leading-tight">GreenMetric</h2>
          <span class="text-[10px] font-extrabold uppercase tracking-widest text-c-green">UNILA CAMPUS</span>
        </div>
      </div>

      <nav class="mt-6 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-gray-50 font-semibold text-sm transition">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('submission.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gray-100 text-c-black font-bold text-sm border-l-4 border-c-gold">
          <i class="fa-solid fa-paper-plane text-c-slate"></i> Form Submisi
        </a>
      </nav>
    </div>

    <div class="p-4 m-4 rounded-2xl bg-gray-50 border border-gray-200 text-xs text-gray-500">
      <p class="font-bold text-c-black mb-1"><i class="fa-solid fa-info-circle text-c-green"></i> Tanpa Upload File</p>
      Gunakan tautan resmi (*Google Drive / Portal Dokumen UNILA*) yang dapat diakses publik oleh Tim Auditor.
    </div>
  </aside>

  <!-- FORM SUBMISI -->
  <main class="flex-1 ml-64 p-8">
    <div class="max-w-4xl mx-auto">
      
      <!-- Notifikasi Berhasil -->
      @if(session('success'))
      <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-c-green text-c-green flex items-center gap-3 shadow-sm">
        <i class="fa-solid fa-circle-check text-xl"></i>
        <div>
          <h4 class="font-bold text-sm">Pengiriman Sukses!</h4>
          <p class="text-xs text-emerald-800">{{ session('success') }}</p>
        </div>
      </div>
      @endif

      <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <!-- Form Header -->
        <div class="bg-c-black p-8 text-white border-b-4 border-c-gold">
          <span class="px-2.5 py-1 rounded bg-c-slate text-c-gold text-[10px] font-black uppercase tracking-wider">Submisi Resmi</span>
          <h1 class="text-2xl font-black mt-2">Formulir Pelaporan Capaian Indikator</h1>
          <p class="text-xs text-gray-300 mt-1">Isi formulir berikut untuk memperbarui metrik data fakultas/unit pada UI GreenMetric UNILA.</p>
        </div>

        <!-- Form Body -->
        <form action="{{ route('submission.store') }}" method="POST" class="p-8 space-y-6">
          @csrf

          <!-- Pilihan Kategori / Indikator -->
          <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-c-black mb-2">Pilih Indikator UI GreenMetric <span class="text-c-red">*</span></label>
            <select name="indikator_code" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium focus:bg-white focus:border-c-slate focus:outline-none">
              <option value="">-- Pilih Indikator Terkait --</option>
              @foreach($indikators as $cat)
                <optgroup label="{{ $cat['code'] }} - {{ $cat['title'] }}">
                  @foreach($cat['sub_indicators'] as $sub)
                    <option value="{{ $sub['code'] }}">{{ $sub['code'] }} - {{ $sub['name'] }}</option>
                  @endforeach
                </optgroup>
              @endforeach
            </select>
          </div>

          <!-- Asal Fakultas & Nama Pelapor -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-xs font-bold uppercase tracking-wider text-c-black mb-2">Fakultas / Unit Kerja <span class="text-c-red">*</span></label>
              <select name="faculty_name" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium focus:bg-white focus:border-c-slate focus:outline-none">
                <option value="">-- Pilih Fakultas/Unit --</option>
                <option value="Fakultas Teknik">Fakultas Teknik</option>
                <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                <option value="Fakultas MIPA">Fakultas MIPA</option>
                <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                <option value="Fakultas Hukum">Fakultas Hukum</option>
                <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                <option value="Fakultas KIP">Fakultas KIP</option>
                <option value="Fakultas ISIP">Fakultas ISIP</option>
                <option value="Biro Perencanaan / Rektorat">Biro Perencanaan / Rektorat</option>
              </select>
            </div>

            <div>
              <label class="block text-xs font-bold uppercase tracking-wider text-c-black mb-2">Nilai Metrik / Capaian Riil <span class="text-c-red">*</span></label>
              <input type="text" name="metric_value" required placeholder="Contoh: 85%, 250 kWp, atau 14 Ha" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium focus:bg-white focus:border-c-slate focus:outline-none">
            </div>
          </div>

          <!-- Data Petugas -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-xs font-bold uppercase tracking-wider text-c-black mb-2">Nama Lengkap PIC / Dosen Pelapor <span class="text-c-red">*</span></label>
              <input type="text" name="reporter_name" required placeholder="Masukkan nama dan gelar" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium focus:bg-white focus:border-c-slate focus:outline-none">
            </div>

            <div>
              <label class="block text-xs font-bold uppercase tracking-wider text-c-black mb-2">NIP / NIDN Pelapor <span class="text-c-red">*</span></label>
              <input type="text" name="reporter_nip" required placeholder="Nomor Induk Pegawai" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium focus:bg-white focus:border-c-slate focus:outline-none">
            </div>
          </div>

          <!-- Tautan Dokumen Pendukung (PENGGANTI UPLOAD PDF) -->
          <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-c-black mb-1">
              Tautan Dokumen / Repositori Online Bukti <span class="text-c-red">*</span>
            </label>
            <p class="text-[11px] text-gray-400 mb-2">Masukkan tautan penyimpanan (Google Drive/OneDrive/Nextcloud UNILA) yang berisi dokumen SK, foto kegiatan, atau laporan.</p>
            <div class="relative">
              <i class="fa-solid fa-link absolute left-4 top-3.5 text-gray-400 text-xs"></i>
              <input type="url" name="evidence_url" required placeholder="https://drive.google.com/... atau https://unila.ac.id/dokumen/..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium focus:bg-white focus:border-c-slate focus:outline-none">
            </div>
          </div>

          <!-- Deskripsi & Keterangan Tambahan -->
          <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-c-black mb-2">Deskripsi Ringkas & Narasi Bukti <span class="text-c-red">*</span></label>
            <textarea name="description" rows="4" required placeholder="Jelaskan secara ringkas metodologi pengukuran, tanggal pelaksanaan, atau lokasi fisik fasilitas..." class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl text-xs font-medium focus:bg-white focus:border-c-slate focus:outline-none"></textarea>
          </div>

          <!-- Tombol Kirim -->
          <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
            <a href="{{ route('dashboard') }}" class="px-6 py-2.5 rounded-xl border border-gray-300 text-xs font-bold text-gray-600 hover:bg-gray-50 transition">
              Batal
            </a>
            <button type="submit" class="px-8 py-2.5 rounded-xl bg-c-black hover:bg-c-slate text-c-gold border-b-2 border-c-gold font-bold text-xs shadow-md transition flex items-center gap-2">
              <i class="fa-solid fa-paper-plane"></i> Kirim Data Submisi
            </button>
          </div>

        </form>
      </div>

    </div>
  </main>

</body>
</html>