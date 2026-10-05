<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data Kategori GreenMetric
        $categories = [
            [
                'code' => 'SI',
                'title' => 'Setting & Infrastructure',
                'weight' => '15.00%',
                'desc' => 'Mengukur rasio lahan hijau, ruang terbuka, bangunan ramah lingkungan dan anggaran keberlanjutan kampus.',
                'sub' => '5 sub-indikator'
            ],
            [
                'code' => 'EC',
                'title' => 'Energy & Climate Change',
                'weight' => '21.00%',
                'desc' => 'Mengukur penggunaan energi terbarukan, efisiensi energi dan program konservasi iklim.',
                'sub' => '5 sub-indikator'
            ],
            [
                'code' => 'WS',
                'title' => 'Waste Management',
                'weight' => '18.00%',
                'desc' => 'Mengukur program daur ulang, pengelolaan sampah organik dan kebijakan pengurangan limbah.',
                'sub' => '5 sub-indikator'
            ],
            [
                'code' => 'WR',
                'title' => 'Water Conservation',
                'weight' => '10.00%',
                'desc' => 'Mengukur program konservasi air, daur ulang air dan sistem pemanenan air hujan.',
                'sub' => '4 sub-indikator'
            ],
            [
                'code' => 'TR',
                'title' => 'Transportation',
                'weight' => '18.00%',
                'desc' => 'Mengukur kebijakan transportasi ramah lingkungan dan infrastruktur pejalan kaki.',
                'sub' => '5 sub-indikator'
            ],
            [
                'code' => 'ED',
                'title' => 'Education & Research',
                'weight' => '18.00%',
                'desc' => 'Mengukur kurikulum lingkungan, penelitian keberlanjutan dan kegiatan edukasi hijau.',
                'sub' => '5 sub-indikator'
            ],
        ];

        // Data Ranking
        $rankings = [
            ['rank' => 1, 'name' => 'Universitas Indonesia', 'country' => 'Indonesia', 'score' => '8,750'],
            ['rank' => 2, 'name' => 'Universitas Diponegoro', 'country' => 'Indonesia', 'score' => '8,620'],
            ['rank' => 3, 'name' => 'Universitas Gadjah Mada', 'country' => 'Indonesia', 'score' => '8,490'],
            ['rank' => 4, 'name' => 'Universitas Negeri Semarang', 'country' => 'Indonesia', 'score' => '8,350'],
            ['rank' => 6, 'name' => 'Universitas Sebelas Maret', 'country' => 'Indonesia', 'score' => '8,100'],
        ];

        // Data Tim Inti
        $teams = [
            ['initials' => 'AY', 'name' => 'Prof. Dr. Ir. Ahmad Yani', 'role' => 'Ketua Tim GreenMetric', 'dept' => 'Fakultas Pertanian'],
            ['initials' => 'SN', 'name' => 'Dr. Siti Nurhaliza, M.T.', 'role' => 'Koordinator Indikator SI & EC', 'dept' => 'Fakultas Teknik'],
            ['initials' => 'BS', 'name' => 'Dr. Bambang Susanto', 'role' => 'Koordinator Indikator WS & WR', 'dept' => 'Fakultas MIPA'],
            ['initials' => 'DR', 'name' => 'Ir. Dewi Rahayu, M.Sc.', 'role' => 'Koordinator Indikator TR', 'dept' => 'Fakultas Teknik'],
            ['initials' => 'RH', 'name' => 'Dr. Rudi Hartono, M.Pd.', 'role' => 'Koordinator Indikator ED', 'dept' => 'Fakultas KIP'],
            ['initials' => 'MF', 'name' => 'Muhammad Fadhil, S.T.', 'role' => 'Analis Data & Sistem', 'dept' => 'Biro Akademik'],
        ];

        return view('home', compact('categories', 'rankings', 'teams'));
    }
}