<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Indicator;
use App\Models\University;
use App\Models\Submission;
use Illuminate\Database\Seeder;

class GreenMetricSeeder extends Seeder
{
    public function run(): void
    {
        // =========================================================
        // KATEGORI — 6 Kategori UI GreenMetric (SI sampai ED)
        // Bobot mengikuti skema lama (total 100%), TIDAK memakai
        // bobot resmi 2026 (yang totalnya 89% tanpa kategori GD)
        // Referensi indikator & poin: Pedoman UI GreenMetric 2026
        // (Lampiran 1, hal. 52-61), https://uigreenmetric.com
        // =========================================================
        $categories = [
            [
                'name'   => 'Setting & Infrastructure (SI)',
                'slug'   => 'SI',
                'color'  => '#2196F3', // Biru — infrastruktur
                'weight' => 15,
            ],
            [
                'name'   => 'Energy & Climate Change (EC)',
                'slug'   => 'EC',
                'color'  => '#FF9800', // Oranye — energi
                'weight' => 21,
            ],
            [
                'name'   => 'Waste (WS)',
                'slug'   => 'WS',
                'color'  => '#9C27B0', // Ungu — sampah
                'weight' => 18,
            ],
            [
                'name'   => 'Water (WR)',
                'slug'   => 'WR',
                'color'  => '#00BCD4', // Cyan — air
                'weight' => 10,
            ],
            [
                'name'   => 'Transportation (TR)',
                'slug'   => 'TR',
                'color'  => '#F44336', // Merah — transportasi
                'weight' => 18,
            ],
            [
                'name'   => 'Education & Research (ED)',
                'slug'   => 'ED',
                'color'  => '#4CAF50', // Hijau — edukasi
                'weight' => 18,
            ],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // =========================================================
        // INDIKATOR — Sesuai Tabel 3 (Pedoman UI GreenMetric 2026)
        // Kode dan poin maksimal mengikuti dokumen resmi (Lampiran 1).
        // category_id: 1=SI, 2=EC, 3=WS, 4=WR, 5=TR, 6=ED
        // =========================================================
        $indicators = [

            // --- 1) SETTING & INFRASTRUCTURE (SI) — Total resmi 1100 poin ---
            [
                'category_id' => 1,
                'name'        => 'SI1 - Rasio Luas Ruang Terbuka terhadap Total Luas',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase luas ruang terbuka dibandingkan total luas kampus. Rumus: SI1 (%) = ((Total luas kampus - Total luas lantai dasar bangunan) / Total luas kampus) x 100%.',
            ],
            [
                'category_id' => 1,
                'name'        => 'SI2 - Total Luas Kampus Tertutup Vegetasi Hutan untuk Riset, Pengajaran, dan/atau Pelibatan Masyarakat',
                'unit'        => '%',
                'max_score'   => 100,
                'description' => 'Persentase area kampus yang ditutupi vegetasi hutan (alami dan/atau ditanam) yang dimiliki universitas dan digunakan untuk kepentingan akademik atau komunitas.',
            ],
            [
                'category_id' => 1,
                'name'        => 'SI3 - Total Luas Kampus yang Ditutupi Vegetasi Tanam',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase area kampus yang ditutupi vegetasi tanam (rumput, taman, atap hijau, taman vertikal), tidak termasuk hutan, dibandingkan total luas kampus.',
            ],
            [
                'category_id' => 1,
                'name'        => 'SI4 - Total Luas Ruang Terbuka dibagi Total Populasi Kampus',
                'unit'        => 'm²/orang',
                'max_score'   => 200,
                'description' => 'Luas ruang terbuka per orang di kampus. Rumus: SI4 (m²/orang) = (Total luas kampus - Total luas lantai dasar bangunan) / (Total mahasiswa reguler + Total staf).',
            ],
            [
                'category_id' => 1,
                'name'        => 'SI5 - Fasilitas Kampus untuk Penyandang Disabilitas, Kebutuhan Khusus, dan/atau Layanan Maternitas',
                'unit'        => 'skor',
                'max_score'   => 100,
                'description' => 'Ketersediaan fasilitas pendukung penyandang disabilitas, individu dengan kebutuhan khusus, dan/atau layanan maternitas (akses perpustakaan, toilet, ruang laktasi, dan lain-lain).',
            ],
            [
                'category_id' => 1,
                'name'        => 'SI6 - Fasilitas Keamanan dan Keselamatan',
                'unit'        => 'skor',
                'max_score'   => 100,
                'description' => 'Ketersediaan infrastruktur kampus yang mendukung keamanan dan keselamatan warga kampus (CCTV, hotline darurat, personel tersertifikasi, APAR, hidran, dan kecepatan respons).',
            ],
            [
                'category_id' => 1,
                'name'        => 'SI7 - Infrastruktur Kesehatan untuk Mendukung Kesejahteraan Mahasiswa, Staf Akademik, dan Staf Administrasi',
                'unit'        => 'skor',
                'max_score'   => 100,
                'description' => 'Ketersediaan infrastruktur kampus yang mendukung layanan kesehatan fisik dan mental (pertolongan pertama, IGD, klinik, rumah sakit, dan personel tersertifikasi).',
            ],
            [
                'category_id' => 1,
                'name'        => 'SI8 - Konservasi Flora, Fauna, Satwa Liar, dan/atau Sumber Daya Genetik',
                'unit'        => 'skor',
                'max_score'   => 100,
                'description' => 'Program kampus untuk konservasi flora, fauna, satwa liar, dan/atau sumber daya genetik untuk pangan dan pertanian dalam fasilitas konservasi jangka menengah atau panjang.',
            ],

            // --- 2) ENERGY & CLIMATE CHANGE (EC) — Total resmi 2000 poin ---
            [
                'category_id' => 2,
                'name'        => 'EC1 - Penggunaan Peralatan Hemat Energi',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Perbandingan jumlah peralatan hemat energi (AC ramah lingkungan, lampu LED, komputer bersertifikat Energy Star) dengan peralatan konvensional yang digunakan di kampus.',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC2 - Implementasi Smart Building',
                'unit'        => '%',
                'max_score'   => 300,
                'description' => 'Persentase luas lantai smart building dibandingkan total luas lantai seluruh bangunan kampus. Rumus: EC2 (%) = (Total luas smart building / Total luas bangunan kampus) x 100.',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC3 - Jumlah Sumber Energi Terbarukan di Kampus',
                'unit'        => 'sumber',
                'max_score'   => 300,
                'description' => 'Jumlah jenis sumber energi terbarukan yang digunakan di kampus (biodiesel, biomassa bersih, tenaga surya, panas bumi, tenaga angin, tenaga air, dan/atau CHP).',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC4 - Penggunaan Listrik per Populasi Kampus',
                'unit'        => 'kWh/orang',
                'max_score'   => 200,
                'description' => 'Total penggunaan listrik tahunan dibagi total populasi kampus (mahasiswa dan staf). Rumus: EC4 = Total penggunaan listrik (kWh) / Total populasi kampus.',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC5 - Rasio Produksi Energi Terbarukan terhadap Total Penggunaan Energi Tahunan',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase produksi energi terbarukan dibandingkan total penggunaan energi kampus dalam satu tahun.',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC6 - Elemen Green Building yang Diterapkan di Seluruh Bangunan',
                'unit'        => 'elemen',
                'max_score'   => 200,
                'description' => 'Jumlah elemen green building yang diterapkan pada bangunan kampus (ventilasi alami, pencahayaan alami, manajer energi gedung, sertifikasi green building, dan lain-lain — lihat Lampiran 2).',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC7 - Program Pengurangan Emisi Gas Rumah Kaca (GHG)',
                'unit'        => 'skor',
                'max_score'   => 200,
                'description' => 'Program formal universitas untuk mengurangi emisi gas rumah kaca, dinilai berdasarkan jumlah cakupan (Scope 1, 2, dan/atau 3) yang ditangani.',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC8 - Jejak Karbon per Populasi Kampus',
                'unit'        => 'ton/orang',
                'max_score'   => 200,
                'description' => 'Total jejak karbon (emisi CO2 dalam 12 bulan terakhir, tidak termasuk penerbangan) dibagi total populasi kampus. Lihat metode perhitungan pada Lampiran 4.',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC9 - Jumlah Program Inovatif di Bidang Energi dan Perubahan Iklim',
                'unit'        => 'program',
                'max_score'   => 100,
                'description' => 'Jumlah program inovatif yang dibuat dan dikembangkan sendiri oleh universitas untuk efisiensi energi, mitigasi iklim, dan capaian keberlanjutan.',
            ],
            [
                'category_id' => 2,
                'name'        => 'EC10 - Program Universitas yang Berdampak pada Perubahan Iklim',
                'unit'        => 'skor',
                'max_score'   => 100,
                'description' => 'Program universitas terkait risiko, dampak, mitigasi, adaptasi, pengurangan dampak, dan/atau peringatan dini perubahan iklim.',
            ],

            // --- 3) WASTE (WS) — Total resmi 1700 poin ---
            [
                'category_id' => 3,
                'name'        => 'WS1 - Program 3R (Reduce, Reuse, Recycle) untuk Sampah Universitas',
                'unit'        => 'skor',
                'max_score'   => 200,
                'description' => 'Upaya universitas mendorong staf dan mahasiswa menerapkan prinsip Reduce, Reuse, dan Recycle pada pengelolaan sampah kampus.',
            ],
            [
                'category_id' => 3,
                'name'        => 'WS2 - Program untuk Mengurangi Penggunaan Kertas dan Plastik di Kampus',
                'unit'        => 'program',
                'max_score'   => 300,
                'description' => 'Jumlah program/kebijakan formal untuk mengurangi penggunaan kertas dan plastik (cetak dua sisi, rapat tanpa kertas, tumbler pakai ulang, kemasan ramah lingkungan, dan lain-lain).',
            ],
            [
                'category_id' => 3,
                'name'        => 'WS3 - Pengolahan Sampah Organik',
                'unit'        => '%',
                'max_score'   => 300,
                'description' => 'Persentase sampah organik (sisa makanan, sampah sayuran, bahan biodegradabel) yang diolah dibandingkan total sampah organik yang dihasilkan.',
            ],
            [
                'category_id' => 3,
                'name'        => 'WS4 - Pengolahan Sampah Anorganik',
                'unit'        => '%',
                'max_score'   => 300,
                'description' => 'Persentase sampah anorganik non-beracun (kertas, plastik, logam, kaca, e-waste) yang diolah dibandingkan total sampah anorganik yang dihasilkan.',
            ],
            [
                'category_id' => 3,
                'name'        => 'WS5 - Pengolahan Sampah Beracun (B3)',
                'unit'        => '%',
                'max_score'   => 300,
                'description' => 'Persentase sampah beracun (baterai, lampu fluoresen, limbah kimia laboratorium) yang dipisahkan, didokumentasikan, dan diolah oleh pengelola tersertifikasi.',
            ],
            [
                'category_id' => 3,
                'name'        => 'WS6 - Pembuangan/Pengolahan Air Limbah',
                'unit'        => 'skor',
                'max_score'   => 300,
                'description' => 'Metode utama pengolahan air limbah kampus, dinilai dari tingkat pengolahan (pendahuluan, primer, sekunder, hingga tersier).',
            ],

            // --- 4) WATER (WR) — Total resmi 1100 poin ---
            [
                'category_id' => 4,
                'name'        => 'WR1 - Total Area untuk Resapan Air (di luar Area Hutan dan Vegetasi Tanam)',
                'unit'        => '%',
                'max_score'   => 100,
                'description' => 'Persentase permukaan lahan kampus yang mendukung resapan air (tanah, rumput, paving block permeabel, area infiltrasi), tidak termasuk area hutan dan vegetasi tanam.',
            ],
            [
                'category_id' => 4,
                'name'        => 'WR2 - Program Konservasi Air dan Implementasinya',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Tahap implementasi program konservasi air sistematis dan formal (penampungan air hujan, tangki air, biopori, sumur imbuhan, dan infrastruktur konservasi lainnya).',
            ],
            [
                'category_id' => 4,
                'name'        => 'WR3 - Implementasi Program Daur Ulang Air',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase air yang didaur ulang atau dimanfaatkan ulang untuk penyiraman toilet, pencucian kendaraan, irigasi lanskap, atau penggunaan non-konsumsi lainnya.',
            ],
            [
                'category_id' => 4,
                'name'        => 'WR4 - Penggunaan Peralatan Hemat Air',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase perangkat hemat air (keran sensor, keran low-flow, toilet dual-flush, shower hemat air) yang terpasang dibandingkan perangkat konvensional.',
            ],
            [
                'category_id' => 4,
                'name'        => 'WR5 - Konsumsi Air Olahan',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase konsumsi air olahan dibandingkan seluruh sumber air yang digunakan universitas (tangki air hujan, air tanah, air permukaan, pasokan air kota).',
            ],
            [
                'category_id' => 4,
                'name'        => 'WR6 - Pengendalian Pencemaran Air di Area Kampus',
                'unit'        => 'skor',
                'max_score'   => 200,
                'description' => 'Tahap upaya pengendalian pencemaran air kampus untuk mencegah limpasan tercemar masuk ke sistem air kampus dan badan air sekitarnya.',
            ],

            // --- 5) TRANSPORTATION (TR) — Total resmi 1700 poin ---
            [
                'category_id' => 5,
                'name'        => 'TR1 - Total Jumlah Kendaraan Beremisi dibagi Total Populasi Kampus',
                'unit'        => 'rasio',
                'max_score'   => 200,
                'description' => 'Rasio jumlah kendaraan beremisi (mobil dan motor dengan mesin pembakaran internal) yang masuk kampus dibagi total populasi kampus.',
            ],
            [
                'category_id' => 5,
                'name'        => 'TR2 - Layanan Shuttle',
                'unit'        => 'skor',
                'max_score'   => 250,
                'description' => 'Ketersediaan layanan shuttle untuk perjalanan di dalam kampus, dinilai dari status gratis/berbayar dan jenis kendaraan yang digunakan (termasuk tanpa emisi).',
            ],
            [
                'category_id' => 5,
                'name'        => 'TR3 - Ketersediaan Zero Emission Vehicles (ZEV) di Kampus',
                'unit'        => 'skor',
                'max_score'   => 200,
                'description' => 'Sejauh mana universitas mendukung penggunaan kendaraan tanpa emisi (sepeda, sepeda listrik, skuter listrik, mobil/motor listrik) untuk transportasi di kampus.',
            ],
            [
                'category_id' => 5,
                'name'        => 'TR4 - Jumlah ZEV dibagi Total Populasi Kampus',
                'unit'        => 'rasio',
                'max_score'   => 200,
                'description' => 'Rata-rata jumlah harian Zero Emission Vehicles di kampus dibagi total populasi kampus (mahasiswa dan staf).',
            ],
            [
                'category_id' => 5,
                'name'        => 'TR5 - Rasio Luas Parkir Permukaan terhadap Total Luas Kampus',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase luas area parkir pada permukaan tanah dibandingkan total luas kampus.',
            ],
            [
                'category_id' => 5,
                'name'        => 'TR6 - Program Membatasi atau Mengurangi Area Parkir dalam Tiga Tahun Terakhir',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase penurunan area parkir kampus dalam tiga tahun terakhir sebagai bagian dari upaya pembatasan kendaraan bermotor.',
            ],
            [
                'category_id' => 5,
                'name'        => 'TR7 - Jumlah Inisiatif untuk Mengurangi Kendaraan Pribadi di Kampus',
                'unit'        => 'inisiatif',
                'max_score'   => 200,
                'description' => 'Jumlah inisiatif universitas untuk mengurangi penggunaan kendaraan pribadi (hari bebas kendaraan, car-sharing, peningkatan tarif parkir, bike-sharing, dan lain-lain).',
            ],
            [
                'category_id' => 5,
                'name'        => 'TR8 - Jalur Pejalan Kaki di Kampus',
                'unit'        => 'skor',
                'max_score'   => 250,
                'description' => 'Ketersediaan dan kualitas jalur pejalan kaki di kampus, dinilai dari aspek keselamatan, kenyamanan, dan fitur ramah disabilitas.',
            ],

            // --- 6) EDUCATION & RESEARCH (ED) — Total resmi 1300 poin ---
            [
                'category_id' => 6,
                'name'        => 'ED1 - Rasio Mata Kuliah/Subjek Terkait Keberlanjutan terhadap Total Mata Kuliah/Subjek',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase mata kuliah atau subjek bertema keberlanjutan (lingkungan, sosial, budaya, ekonomi) dibandingkan total mata kuliah yang ditawarkan universitas.',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED2 - Rasio Pendanaan Riset Keberlanjutan terhadap Total Pendanaan Riset',
                'unit'        => '%',
                'max_score'   => 200,
                'description' => 'Persentase rata-rata tahunan pendanaan riset keberlanjutan dibandingkan total pendanaan riset universitas selama tiga tahun terakhir.',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED3 - Rasio Publikasi Ilmiah Terkait Keberlanjutan terhadap Dosen/Peneliti',
                'unit'        => 'rasio',
                'max_score'   => 200,
                'description' => 'Jumlah publikasi ilmiah terindeks tentang keberlanjutan dibagi total jumlah dosen dan peneliti pada periode satu tahun yang sama.',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED4 - Jumlah Kegiatan atau Program Terkait Keberlanjutan',
                'unit'        => 'kegiatan',
                'max_score'   => 100,
                'description' => 'Rata-rata jumlah tahunan kegiatan terkait keberlanjutan yang diselenggarakan universitas (konferensi, lokakarya, kampanye awareness, pelatihan, festival).',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED5 - Jumlah Kegiatan Terkait Keberlanjutan yang Diselenggarakan Organisasi Mahasiswa per Tahun',
                'unit'        => 'kegiatan',
                'max_score'   => 150,
                'description' => 'Jumlah kegiatan terkait keberlanjutan yang diorganisasi oleh organisasi mahasiswa tingkat fakultas atau universitas per tahun.',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED6 - Jumlah Kegiatan Budaya di Kampus',
                'unit'        => 'kegiatan',
                'max_score'   => 100,
                'description' => 'Jumlah kegiatan budaya yang diselenggarakan di kampus per tahun (festival budaya, teater, pertunjukan musik, pameran).',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED7 - Jumlah Program Keberlanjutan dengan Kolaborasi Internasional',
                'unit'        => 'program',
                'max_score'   => 100,
                'description' => 'Jumlah program keberlanjutan universitas dengan kolaborasi internasional per tahun (riset bersama, kursus daring, pertukaran mahasiswa/staf, magang).',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED8 - Jumlah Kegiatan Pengabdian kepada Masyarakat Terkait Keberlanjutan yang Melibatkan Mahasiswa',
                'unit'        => 'proyek',
                'max_score'   => 100,
                'description' => 'Jumlah proyek pengabdian kepada masyarakat terkait keberlanjutan yang diselenggarakan universitas dan melibatkan mahasiswa per tahun.',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED9 - Jumlah Start-up Terkait Keberlanjutan',
                'unit'        => 'start-up',
                'max_score'   => 100,
                'description' => 'Jumlah start-up terkait keberlanjutan (profit/nirlaba, digital/non-digital) yang diinisiasi dan dikelola universitas, didirikan dalam tiga tahun terakhir.',
            ],
            [
                'category_id' => 6,
                'name'        => 'ED10 - Persentase Lulusan dengan Green Jobs (Tiga Tahun Terakhir)',
                'unit'        => '%',
                'max_score'   => 50,
                'description' => 'Persentase lulusan yang memperoleh green jobs dibandingkan total jumlah lulusan dalam tiga tahun terakhir.',
            ],
        ];

        foreach ($indicators as $ind) {
            Indicator::create($ind);
        }

        // =========================================================
        // UNIVERSITAS — Data peserta GreenMetric
        // =========================================================
        $universities = [
            ['name' => 'Universitas Indonesia',       'country' => 'Indonesia', 'rank' => 1,  'score' => 8750],
            ['name' => 'Universitas Diponegoro',      'country' => 'Indonesia', 'rank' => 2,  'score' => 8620],
            ['name' => 'Universitas Gadjah Mada',     'country' => 'Indonesia', 'rank' => 3,  'score' => 8490],
            ['name' => 'Universitas Negeri Semarang', 'country' => 'Indonesia', 'rank' => 4,  'score' => 8350],
            ['name' => 'Universitas Sebelas Maret',   'country' => 'Indonesia', 'rank' => 6,  'score' => 8100],
            ['name' => 'Universitas Airlangga',       'country' => 'Indonesia', 'rank' => 7,  'score' => 8050],
            ['name' => 'Universitas Padjadjaran',     'country' => 'Indonesia', 'rank' => 9,  'score' => 7900],
            ['name' => 'UIN Raden Intan Lampung',     'country' => 'Indonesia', 'rank' => 10, 'score' => 7850],
            ['name' => 'Telkom University',           'country' => 'Indonesia', 'rank' => 11, 'score' => 7800],
            ['name' => 'Universitas Lampung',         'country' => 'Indonesia', 'rank' => 16, 'score' => 7500],
            ['name' => 'Universitas Brawijaya',       'country' => 'Indonesia', 'rank' => 20, 'score' => 7200],
        ];

        foreach ($universities as $uni) {
            University::create($uni);
        }

        // =========================================================
        // SUBMISSION — Contoh data pengisian indikator UNILA
        // university_id = 10 (Universitas Lampung, urutan ke-10 di atas)
        // indicator_id mengikuti urutan insert: 1-8 SI, 9-18 EC,
        // 19-24 WS, 25-30 WR, 31-38 TR, 39-48 ED
        // =========================================================
        $unilaId = University::where('name', 'Universitas Lampung')->value('id');

        $submissions = [
            // --- SI (indicator_id 1-8) ---
            ['indicator_id' => 1,  'value' => 35.5, 'score' => 142, 'status' => 'verified'],  // SI1 max 200
            ['indicator_id' => 2,  'value' => 8.0,  'score' => 50,  'status' => 'verified'],  // SI2 max 100
            ['indicator_id' => 3,  'value' => 22.0, 'score' => 150, 'status' => 'verified'],  // SI3 max 200
            ['indicator_id' => 4,  'value' => 25.0, 'score' => 150, 'status' => 'submitted'], // SI4 max 200
            ['indicator_id' => 5,  'value' => 4,    'score' => 75,  'status' => 'verified'],  // SI5 max 100
            ['indicator_id' => 6,  'value' => 3,    'score' => 50,  'status' => 'verified'],  // SI6 max 100
            ['indicator_id' => 7,  'value' => 3,    'score' => 50,  'status' => 'draft'],     // SI7 max 100
            ['indicator_id' => 8,  'value' => 2,    'score' => 50,  'status' => 'verified'],  // SI8 max 100

            // --- EC (indicator_id 9-18) ---
            ['indicator_id' => 9,  'value' => 55.0, 'score' => 150, 'status' => 'verified'],  // EC1 max 200
            ['indicator_id' => 10, 'value' => 15.0, 'score' => 75,  'status' => 'verified'],  // EC2 max 300
            ['indicator_id' => 11, 'value' => 2,    'score' => 150, 'status' => 'submitted'], // EC3 max 300
            ['indicator_id' => 12, 'value' => 480,  'score' => 100, 'status' => 'verified'],  // EC4 max 200
            ['indicator_id' => 13, 'value' => 1.2,  'score' => 100, 'status' => 'verified'],  // EC5 max 200
            ['indicator_id' => 14, 'value' => 3,    'score' => 150, 'status' => 'verified'],  // EC6 max 200
            ['indicator_id' => 15, 'value' => 2,    'score' => 100, 'status' => 'submitted'], // EC7 max 200
            ['indicator_id' => 16, 'value' => 0.55, 'score' => 100, 'status' => 'verified'],  // EC8 max 200
            ['indicator_id' => 17, 'value' => 2,    'score' => 50,  'status' => 'draft'],     // EC9 max 100
            ['indicator_id' => 18, 'value' => 3,    'score' => 75,  'status' => 'verified'],  // EC10 max 100

            // --- WS (indicator_id 19-24) ---
            ['indicator_id' => 19, 'value' => 60.0, 'score' => 150, 'status' => 'verified'],  // WS1 max 200
            ['indicator_id' => 20, 'value' => 5,    'score' => 150, 'status' => 'verified'],  // WS2 max 300
            ['indicator_id' => 21, 'value' => 55.0, 'score' => 150, 'status' => 'submitted'], // WS3 max 300
            ['indicator_id' => 22, 'value' => 65.0, 'score' => 225, 'status' => 'verified'],  // WS4 max 300
            ['indicator_id' => 23, 'value' => 70.0, 'score' => 225, 'status' => 'verified'],  // WS5 max 300
            ['indicator_id' => 24, 'value' => 3,    'score' => 150, 'status' => 'draft'],     // WS6 max 300

            // --- WR (indicator_id 25-30) ---
            ['indicator_id' => 25, 'value' => 18.0, 'score' => 50,  'status' => 'verified'],  // WR1 max 100
            ['indicator_id' => 26, 'value' => 35.0, 'score' => 150, 'status' => 'verified'],  // WR2 max 200
            ['indicator_id' => 27, 'value' => 30.0, 'score' => 150, 'status' => 'submitted'], // WR3 max 200
            ['indicator_id' => 28, 'value' => 55.0, 'score' => 100, 'status' => 'verified'],  // WR4 max 200
            ['indicator_id' => 29, 'value' => 40.0, 'score' => 100, 'status' => 'verified'],  // WR5 max 200
            ['indicator_id' => 30, 'value' => 4,    'score' => 150, 'status' => 'draft'],     // WR6 max 200

            // --- TR (indicator_id 31-38) ---
            ['indicator_id' => 31, 'value' => 0.30, 'score' => 150, 'status' => 'verified'],  // TR1 max 200
            ['indicator_id' => 32, 'value' => 4,    'score' => 187, 'status' => 'verified'],  // TR2 max 250
            ['indicator_id' => 33, 'value' => 3,    'score' => 150, 'status' => 'submitted'], // TR3 max 200
            ['indicator_id' => 34, 'value' => 0.006,'score' => 100, 'status' => 'verified'],  // TR4 max 200
            ['indicator_id' => 35, 'value' => 6.0,  'score' => 150, 'status' => 'verified'],  // TR5 max 200
            ['indicator_id' => 36, 'value' => 12.0, 'score' => 100, 'status' => 'draft'],     // TR6 max 200
            ['indicator_id' => 37, 'value' => 2,    'score' => 100, 'status' => 'verified'],  // TR7 max 200
            ['indicator_id' => 38, 'value' => 4,    'score' => 187, 'status' => 'verified'],  // TR8 max 250

            // --- ED (indicator_id 39-48) ---
            ['indicator_id' => 39, 'value' => 6.0,  'score' => 100, 'status' => 'verified'],  // ED1 max 200
            ['indicator_id' => 40, 'value' => 12.0, 'score' => 100, 'status' => 'verified'],  // ED2 max 200
            ['indicator_id' => 41, 'value' => 1.5,  'score' => 100, 'status' => 'submitted'], // ED3 max 200
            ['indicator_id' => 42, 'value' => 28,   'score' => 75,  'status' => 'verified'],  // ED4 max 100
            ['indicator_id' => 43, 'value' => 15,   'score' => 112, 'status' => 'verified'],  // ED5 max 150
            ['indicator_id' => 44, 'value' => 5,    'score' => 50,  'status' => 'draft'],     // ED6 max 100
            ['indicator_id' => 45, 'value' => 4,    'score' => 50,  'status' => 'verified'],  // ED7 max 100
            ['indicator_id' => 46, 'value' => 5,    'score' => 50,  'status' => 'verified'],  // ED8 max 100
            ['indicator_id' => 47, 'value' => 3,    'score' => 50,  'status' => 'submitted'], // ED9 max 100
            ['indicator_id' => 48, 'value' => 8.0,  'score' => 38,  'status' => 'verified'],  // ED10 max 50
        ];

        foreach ($submissions as $sub) {
            Submission::create(array_merge($sub, [
                'university_id' => $unilaId,
                'year'          => 2026,
            ]));
        }
    }
}