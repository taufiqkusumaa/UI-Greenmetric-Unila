@extends('layouts.public')

@section('title', 'Beranda — UI GreenMetric UNILA')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endpush

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero">
    <div class="hero-content">
        <div class="hero-badge">🌿 UI GreenMetric UNILA</div>
        <h1>Advancing <span>Sustainability</span><br>for a Greener Campus</h1>
        <p>Universitas Lampung berkomitmen membangun kampus berkelanjutan melalui pengukuran dan peningkatan indikator GreenMetric secara terstruktur, transparan, dan berbasis data.</p>
        <div class="hero-btns">
            <a href="#indikator" class="btn-primary">🌱 Lihat Indikator</a>
            <a href="{{ url('/admin') }}" class="btn-secondary" target="_blank">📊 Buka Dashboard</a>
        </div>
        <div class="hero-stats">
            <div class="hero-stat">
                <div class="hero-stat-num">{{ $stats['categories'] }}</div>
                <div class="hero-stat-lbl">Kategori</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num">{{ $stats['indicators'] }}</div>
                <div class="hero-stat-lbl">Indikator</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num">{{ $stats['universities'] }}</div>
                <div class="hero-stat-lbl">Universitas</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num">{{ $stats['submissions'] }}</div>
                <div class="hero-stat-lbl">Data Verified</div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TENTANG ===== --}}
<div class="section-alt" id="tentang">
    <div class="section-inner">
        <div class="about-grid">
            <div>
                <div class="section-label">Tentang Program</div>
                <div class="section-title">Komitmen UNILA untuk Keberlanjutan</div>
                <p class="section-sub" style="margin:1rem 0;">
                    UI GreenMetric World University Rankings adalah sistem pemeringkatan universitas berbasis keberlanjutan lingkungan yang dikembangkan oleh Universitas Indonesia sejak tahun 2010. UNILA aktif berpartisipasi untuk terus meningkatkan skor dan implementasi nyata di kampus.
                </p>
                <ul class="check-list">
                    <li><span class="check-icon">✓</span> Pengukuran berbasis data real-time dan transparan</li>
                    <li><span class="check-icon">✓</span> Mencakup 6 kategori indikator keberlanjutan</li>
                    <li><span class="check-icon">✓</span> Kolaborasi lintas fakultas dan unit kerja</li>
                    <li><span class="check-icon">✓</span> Target peningkatan skor secara berkelanjutan</li>
                    <li><span class="check-icon">✓</span> Berkontribusi pada SDGs dan agenda hijau global</li>
                </ul>
            </div>
            <div class="about-visual">
                <div class="about-visual-label">Profil Program</div>
                <div class="about-visual-title">UI GreenMetric UNILA</div>
                <div class="about-visual-desc">
                    Program pemeringkatan kampus hijau yang mengukur komitmen institusi terhadap keberlanjutan lingkungan secara komprehensif.
                </div>
                <div class="about-stat-grid">
                    <div class="about-stat-card">
                        <div class="about-stat-num">2010</div>
                        <div class="about-stat-lbl">Tahun Berdiri</div>
                    </div>
                    <div class="about-stat-card">
                        <div class="about-stat-num">{{ $stats['categories'] }}</div>
                        <div class="about-stat-lbl">Kategori</div>
                    </div>
                    <div class="about-stat-card">
                        <div class="about-stat-num">{{ $stats['indicators'] }}</div>
                        <div class="about-stat-lbl">Indikator</div>
                    </div>
                    <div class="about-stat-card">
                        <div class="about-stat-num">100%</div>
                        <div class="about-stat-lbl">Komitmen</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== INDIKATOR ===== --}}
<section class="section" id="indikator">
    <div class="section-label">6 Kategori Penilaian</div>
    <div class="section-title">Indikator GreenMetric</div>
    <p class="section-sub">Setiap kategori mengukur aspek keberlanjutan yang berbeda dengan bobot penilaian yang telah ditetapkan secara internasional.</p>
    <div class="indicator-grid">
        @foreach($categories as $cat)
        <a href="{{ route('indikator', $cat->slug) }}" class="indicator-card">
            <div class="indicator-card-header">
                <div class="indicator-badge" data-color="{{ $cat->color }}">
                    {{ $cat->slug }}
                </div>
                <div>
                    <div class="indicator-card-name">{{ explode('(', $cat->name)[0] }}</div>
                    <div class="indicator-card-weight">Bobot: {{ $cat->weight }}%</div>
                </div>
            </div>
            <div class="indicator-card-desc">
                @switch($cat->slug)
                    @case('SI') Mengukur rasio lahan hijau, ruang terbuka, bangunan ramah lingkungan dan anggaran keberlanjutan kampus. @break
                    @case('EC') Mengukur penggunaan energi terbarukan, efisiensi energi dan program konservasi iklim. @break
                    @case('WS') Mengukur program daur ulang, pengelolaan sampah organik dan kebijakan pengurangan limbah. @break
                    @case('WR') Mengukur program konservasi air, daur ulang air dan sistem pemanenan air hujan. @break
                    @case('TR') Mengukur kebijakan transportasi ramah lingkungan dan infrastruktur pejalan kaki. @break
                    @case('ED') Mengukur kurikulum lingkungan, penelitian keberlanjutan dan kegiatan edukasi hijau. @break
                @endswitch
            </div>
            <div class="indicator-card-footer">
                <span>{{ $cat->indicators_count }} sub-indikator</span>
                <span class="indicator-card-footer-link">Lihat Detail →</span>
            </div>
        </a>
        @endforeach
    </div>
</section>

{{-- ===== RANKING ===== --}}
<div class="section-alt">
    <div class="section-inner">
        <div class="section-label">Peringkat</div>
        <div class="section-title">Top Universitas GreenMetric</div>
        <p class="section-sub">Daftar universitas dengan skor GreenMetric tertinggi berdasarkan data terkini.</p>
        <div class="ranking-wrap">
            <table class="ranking-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Universitas</th>
                        <th>Negara</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topUniversities as $uni)
                    <tr>
                        <td>
                            <span class="rank-badge {{ $uni->rank <= 3 ? 'rank-'.$uni->rank : 'rank-other' }}">
                                {{ $uni->rank }}
                            </span>
                        </td>
                        <td class="td-name">{{ $uni->name }}</td>
                        <td class="td-country">{{ $uni->country }}</td>
                        <td>
                            <div class="score-bar-wrap">
                                <span class="score-text">{{ number_format($uni->score) }}</span>
                                <div class="score-bar">
                                    <div class="score-bar-fill" data-width="{{ ($uni->score / 10000) * 100 }}"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ===== TIM ===== --}}
<section class="section" id="tim">
    <div class="section-label">Tim Kami</div>
    <div class="section-title">Anggota Inti GreenMetric UNILA</div>
    <p class="section-sub">Tim yang berdedikasi dalam mengimplementasikan dan mengembangkan program GreenMetric di Universitas Lampung.</p>
    <div class="team-grid">
        @php
        $team = [
            ['nama' => 'Prof. Dr. Ir. Ahmad Yani',   'peran' => 'Ketua Tim GreenMetric',          'dept' => 'Fakultas Pertanian', 'warna' => '#2d5a27', 'inisial' => 'AY'],
            ['nama' => 'Dr. Siti Nurhaliza, M.T.',   'peran' => 'Koordinator Indikator SI & EC',  'dept' => 'Fakultas Teknik',    'warna' => '#2196F3', 'inisial' => 'SN'],
            ['nama' => 'Dr. Bambang Susanto',         'peran' => 'Koordinator Indikator WS & WR', 'dept' => 'Fakultas MIPA',      'warna' => '#00BCD4', 'inisial' => 'BS'],
            ['nama' => 'Ir. Dewi Rahayu, M.Sc.',     'peran' => 'Koordinator Indikator TR',       'dept' => 'Fakultas Teknik',    'warna' => '#F44336', 'inisial' => 'DR'],
            ['nama' => 'Dr. Rudi Hartono, M.Pd.',    'peran' => 'Koordinator Indikator ED',       'dept' => 'Fakultas KIP',       'warna' => '#9C27B0', 'inisial' => 'RH'],
            ['nama' => 'Muhammad Fadhil, S.T.',      'peran' => 'Analis Data & Sistem',           'dept' => 'Biro Akademik',      'warna' => '#FF9800', 'inisial' => 'MF'],
        ];
        @endphp
        @foreach($team as $member)
        <div class="team-card">
            <div class="team-avatar" data-color="{{ $member['warna'] }}">
                {{ $member['inisial'] }}
            </div>
            <div class="team-name">{{ $member['nama'] }}</div>
            <div class="team-role">{{ $member['peran'] }}</div>
            <div class="team-dept">{{ $member['dept'] }}</div>
        </div>
        @endforeach
    </div>
</section>

@push('scripts')
<script>
    // Terapkan warna dinamis dari data-color
    document.querySelectorAll('[data-color]').forEach(el => {
        el.style.background = el.dataset.color;
    });
    // Terapkan lebar score bar dari data-width
    document.querySelectorAll('.score-bar-fill[data-width]').forEach(el => {
        el.style.width = el.dataset.width + '%';
    });
</script>
@endpush

@endsection