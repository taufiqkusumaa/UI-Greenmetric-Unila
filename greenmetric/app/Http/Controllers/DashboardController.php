<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Bank Data 6 Kategori GreenMetric
    private function getIndikatorData()
    {
        return [
            'si' => [
                'code' => 'SI',
                'title' => 'Setting & Infrastructure',
                'weight' => '15.00%',
                'icon' => 'fa-building-columns',
                'pic' => 'Dr. Siti Nurhaliza, M.T. (Fakultas Teknik)',
                'summary' => 'Mengukur rasio lahan hijau, ruang terbuka, bangunan ramah lingkungan, serta alokasi anggaran keberlanjutan UNILA.',
                'sub_indicators' => [
                    ['code' => 'SI-1', 'name' => 'Rasio Ruang Terbuka Hijau terhadap Total Luas Area Kampus', 'target' => '50%', 'status' => 'Tercapai 48.5%'],
                    ['code' => 'SI-2', 'name' => 'Persentase Luas Kampus untuk Penyerapan Air', 'target' => '30%', 'status' => 'Tercapai 32.1%'],
                    ['code' => 'SI-3', 'name' => 'Total Luas Area Hutan dan Vegetasi Lindung Kampus', 'target' => '15 Ha', 'status' => 'Tercapai 16.2 Ha'],
                    ['code' => 'SI-4', 'name' => 'Fasilitas dan Gedung Berkonsep Smart & Green Building', 'target' => '10 Gedung', 'status' => 'Tercapai 8 Gedung'],
                    ['code' => 'SI-5', 'name' => 'Persentase Alokasi APBU Kampus untuk Program Keberlanjutan', 'target' => '5.0%', 'status' => 'Tercapai 4.8%'],
                ]
            ],
            'ec' => [
                'code' => 'EC',
                'title' => 'Energy & Climate Change',
                'weight' => '21.00%',
                'icon' => 'fa-bolt',
                'pic' => 'Dr. Siti Nurhaliza, M.T. (Fakultas Teknik)',
                'summary' => 'Fokus pada efisiensi listrik gedung, pemanfaatan solar cell di fakultas, serta jejak karbon kampus.',
                'sub_indicators' => [
                    ['code' => 'EC-1', 'name' => 'Penggunaan Peralatan Elektronik Hemat Energi (Inverter/LED)', 'target' => '80%', 'status' => 'Tercapai 78%'],
                    ['code' => 'EC-2', 'name' => 'Produksi Energi Bersih Terbarukan (Rooftop Solar PV)', 'target' => '250 kWp', 'status' => 'Tercapai 180 kWp'],
                    ['code' => 'EC-3', 'name' => 'Rasio Total Konsumsi Listrik per Kapita Sivitas Akademika', 'target' => '< 500 kWh', 'status' => '460 kWh'],
                    ['code' => 'EC-4', 'name' => 'Program Konservasi Energi dan Audit Berkala Gedung', 'target' => '100%', 'status' => 'Tercapai 90%'],
                    ['code' => 'EC-5', 'name' => 'Total Jejak Karbon dan Emisi GRK Tahunan Kampus', 'target' => 'Turun 10%', 'status' => 'Turun 7.4%'],
                ]
            ],
            'ws' => [
                'code' => 'WS',
                'title' => 'Waste Management',
                'weight' => '18.00%',
                'icon' => 'fa-recycle',
                'pic' => 'Dr. Bambang Susanto (Fakultas MIPA)',
                'summary' => 'Pengolahan sampah organik terpadu, pemilahan limbah B3 laboratorium, serta pembatasan plastik sekali pakai.',
                'sub_indicators' => [
                    ['code' => 'WS-1', 'name' => 'Program Daur Ulang dan Pemilahan Sampah Organik & Anorganik', 'target' => '70%', 'status' => 'Tercapai 65%'],
                    ['code' => 'WS-2', 'name' => 'Pengolahan dan Pengomposan Limbah Dedaunan Kampus Terpadu', 'target' => '10 Ton/bln', 'status' => '8.5 Ton/bln'],
                    ['code' => 'WS-3', 'name' => 'SOP Pemusnahan Limbah B3 Laboratorium MIPA & Kedokteran', 'target' => '100% Berizin', 'status' => '100% Berizin'],
                    ['code' => 'WS-4', 'name' => 'Kebijakan Kampus Bebas Botol Plastik dan Sedotan Sekali Pakai', 'target' => 'Semua Kantin', 'status' => '80% Kantin'],
                    ['code' => 'WS-5', 'name' => 'Pengolahan Air Limbah Domestik / Sewage Treatment Plant', 'target' => '4 Unit', 'status' => '3 Unit Aktif'],
                ]
            ],
            'wr' => [
                'code' => 'WR',
                'title' => 'Water Conservation',
                'weight' => '10.00%',
                'icon' => 'fa-droplet',
                'pic' => 'Dr. Bambang Susanto (Fakultas MIPA)',
                'summary' => 'Konservasi sumber air tanah, embung resapan air, sumur biopori, dan sistem penampungan air hujan.',
                'sub_indicators' => [
                    ['code' => 'WR-1', 'name' => 'Pemanfaatan Air Daur Ulang untuk Siram Taman & Fasilitas Sanitasi', 'target' => '40%', 'status' => 'Tercapai 35%'],
                    ['code' => 'WR-2', 'name' => 'Penerapan Kran Air Sensor Otomatis dan Efisiensi Air', 'target' => '60% Titik', 'status' => '55% Titik'],
                    ['code' => 'WR-3', 'name' => 'Kapasitas Embung dan Danau Resapan Air Kampus', 'target' => '5 Embung', 'status' => '4 Embung'],
                    ['code' => 'WR-4', 'name' => 'Instalasi Rainwater Harvesting (Pemanenan Air Hujan Gedung)', 'target' => '12 Lokasi', 'status' => '9 Lokasi'],
                ]
            ],
            'tr' => [
                'code' => 'TR',
                'title' => 'Transportation',
                'weight' => '18.00%',
                'icon' => 'fa-bus',
                'pic' => 'Ir. Dewi Rahayu, M.Sc. (Fakultas Teknik)',
                'summary' => 'Penyediaan bus listrik kampus, jalur pedestrian berteduh kanopi kanvas hijau, dan regulasi emisi kendaraan.',
                'sub_indicators' => [
                    ['code' => 'TR-1', 'name' => 'Rasio Kendaraan Bermotor Pribadi Masuk Kampus per Hari', 'target' => 'Turun 15%', 'status' => 'Turun 11%'],
                    ['code' => 'TR-2', 'name' => 'Operasional Shuttle Bus / Kendaraan Listrik Internal Kampus', 'target' => '8 Armada', 'status' => '6 Armada'],
                    ['code' => 'TR-3', 'name' => 'Jaringan Jalur Pejalan Kaki (Pedestrian Way) Terintegrasi', 'target' => '12 Km', 'status' => '9.5 Km'],
                    ['code' => 'TR-4', 'name' => 'Fasilitas Parkir Sepeda dan Penyewaan Sepeda Kampus', 'target' => '20 Stasiun', 'status' => '16 Stasiun'],
                    ['code' => 'TR-5', 'name' => 'Kebijakan Bebas Emisi Kendaraan pada Zona Tengah Kampus', 'target' => 'Aktif', 'status' => 'Berlaku Jam Kerja'],
                ]
            ],
            'ed' => [
                'code' => 'ED',
                'title' => 'Education & Research',
                'weight' => '18.00%',
                'icon' => 'fa-graduation-cap',
                'pic' => 'Dr. Rudi Hartono, M.Pd. (Fakultas KIP)',
                'summary' => 'Mata kuliah bertema lingkungan hidup, dana penelitian keberlanjutan, serta organisasi mahasiswa peduli lingkungan.',
                'sub_indicators' => [
                    ['code' => 'ED-1', 'name' => 'Mata Kuliah Wajib & Pilihan Bertema Keberlanjutan & Lingkungan', 'target' => '120 MK', 'status' => '142 MK (Tercapai)'],
                    ['code' => 'ED-2', 'name' => 'Jumlah Hibah Riset dan Publikasi Ilmiah Terindeks Keberlanjutan', 'target' => '80 Judul', 'status' => '95 Judul'],
                    ['code' => 'ED-3', 'name' => 'Persentase Alokasi Dana Penelitian Khusus Isu Lingkungan & SDGs', 'target' => '12%', 'status' => '14.2%'],
                    ['code' => 'ED-4', 'name' => 'Jumlah Unit Kegiatan Mahasiswa (UKM) Aktif Isu Lingkungan', 'target' => '10 Klub', 'status' => '11 Klub'],
                    ['code' => 'ED-5', 'name' => 'Website Resmi Publikasi Data GreenMetric Terbuka', 'target' => '100% Aktif', 'status' => 'Aktif'],
                ]
            ],
        ];
    }

    // 1. Tampilan Dashboard
    public function index()
    {
        $stats = [
            'rank'             => 11,
            'current_score'    => '8,055',
            'target_score'     => '8,750',
            'total_indicators' => 29,
            'verified_data'    => 20,
        ];

        $categoriesChart = [
            ['code' => 'SI', 'route' => 'si', 'name' => 'Setting & Infrastructure', 'target_height' => '70%', 'score_height' => '85%'],
            ['code' => 'EC', 'route' => 'ec', 'name' => 'Energy & Climate Change',  'target_height' => '60%', 'score_height' => '68%'],
            ['code' => 'WS', 'route' => 'ws', 'name' => 'Waste Management',        'target_height' => '75%', 'score_height' => '80%'],
            ['code' => 'WR', 'route' => 'wr', 'name' => 'Water Conservation',       'target_height' => '50%', 'score_height' => '62%'],
            ['code' => 'TR', 'route' => 'tr', 'name' => 'Transportation',           'target_height' => '65%', 'score_height' => '74%'],
            ['code' => 'ED', 'route' => 'ed', 'name' => 'Education & Research',     'target_height' => '85%', 'score_height' => '95%'],
        ];

        $activities = [
            ['faculty' => 'Fakultas Teknik', 'badge' => 'FT', 'color' => 'bg-amber-100 text-black', 'desc' => 'Unggah data efisiensi solar panel (EC-2).', 'time' => '5 menit yang lalu'],
            ['faculty' => 'Fakultas Pertanian', 'badge' => 'FP', 'color' => 'bg-emerald-100 text-emerald-800', 'desc' => 'Validasi vegetasi hutan lindung (SI-3).', 'time' => '2 jam yang lalu'],
            ['faculty' => 'Biro Perencanaan', 'badge' => 'BP', 'color' => 'bg-blue-100 text-blue-800', 'desc' => 'Pembaruan data daur ulang limbah (WS-1).', 'time' => 'Kemarin'],
        ];

        $benchmarks = [
            ['rank' => 1, 'name' => 'Universitas Indonesia', 'country' => 'Indonesia', 'status' => 'VERIFIED', 'score' => '8,750', 'is_current' => false],
            ['rank' => 2, 'name' => 'Universitas Diponegoro', 'country' => 'Indonesia', 'status' => 'VERIFIED', 'score' => '8,620', 'is_current' => false],
            ['rank' => 3, 'name' => 'Universitas Gadjah Mada', 'country' => 'Indonesia', 'status' => 'VERIFIED', 'score' => '8,490', 'is_current' => false],
            ['rank' => 4, 'name' => 'Universitas Negeri Semarang', 'country' => 'Indonesia', 'status' => 'VERIFIED', 'score' => '8,350', 'is_current' => false],
            ['rank' => 11, 'name' => 'Universitas Lampung (UNILA)', 'country' => 'Indonesia', 'status' => 'IN REVIEW', 'score' => '8,055', 'is_current' => true],
        ];

        return view('dashboard', compact('stats', 'categoriesChart', 'activities', 'benchmarks'));
    }

    // 2. Tampilan Masing-Masing Halaman Indikator
    public function showIndikator($code)
    {
        $code = strtolower($code);
        $indikators = $this->getIndikatorData();

        if (!array_key_exists($code, $indikators)) {
            abort(404, 'Indikator UI GreenMetric tidak ditemukan.');
        }

        $item = $indikators[$code];
        return view('indikator-detail', compact('item'));
    }

    // 3. Tampilan Halaman Formulir Submisi Data (Tanpa Upload PDF)
    public function submissionForm()
    {
        $indikators = $this->getIndikatorData();
        return view('submission', compact('indikators'));
    }

    // 4. Proses Simpan Submisi
    public function storeSubmission(Request $request)
    {
        $validated = $request->validate([
            'indikator_code'   => 'required|string',
            'faculty_name'     => 'required|string|max:150',
            'reporter_name'    => 'required|string|max:100',
            'reporter_nip'     => 'required|string|max:30',
            'metric_value'     => 'required|string|max:100',
            'evidence_url'     => 'required|url',
            'description'      => 'required|string|max:1000',
        ]);

        return redirect()->route('submission.index')->with('success', 'Data capaian indikator berhasil dikirim dan masuk dalam antrean verifikasi Pokja UNILA!');
    }
}