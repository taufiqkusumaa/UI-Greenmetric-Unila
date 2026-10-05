@extends('layouts.public')

@section('title', $category->name . ' — UI GreenMetric UNILA')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/indikator.css') }}">
@endpush

@section('content')

<div class="ind-hero">
    <a href="{{ route('home') }}" class="back-link">← Kembali ke Beranda</a>
    <div class="ind-badge">{{ $category->slug }} · Bobot {{ $category->weight }}%</div>
    <h1>{{ $category->name }}</h1>
    <p>Detail sub-indikator, data submission, dan informasi lengkap seputar kategori {{ $category->slug }} dalam penilaian GreenMetric.</p>
</div>

{{-- Navigasi antar indikator --}}
<div class="ind-nav">
    @foreach($categories as $cat)
    <a href="{{ route('indikator', $cat->slug) }}"
       class="ind-nav-item {{ $cat->slug === $category->slug ? 'active' : '' }}">
        <div class="ind-dot" data-color="{{ $cat->color }}"></div>
        {{ $cat->slug }}
    </a>
    @endforeach
</div>

<div class="ind-content">

    {{-- Sub-Indikator --}}
    <div class="section-card">
        <div class="section-card-title">Sub-Indikator {{ $category->name }}</div>
        <div class="ind-grid">
            @foreach($indicators as $ind)
            <div class="ind-card" data-color="{{ $category->color }}">
                <div class="ind-card-name">{{ $ind->name }}</div>
                @if($ind->description)
                    <div class="ind-card-desc">{{ $ind->description }}</div>
                @endif
                <div class="ind-card-tags">
                    <span class="tag tag-gray">{{ $ind->unit ?? '-' }}</span>
                    <span class="tag tag-blue">Maks: {{ $ind->max_score }}</span>
                    <span class="tag tag-green">{{ $ind->submissions_count }} submission</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="section-card">
        <div class="section-card-title">Data Submission Terverifikasi</div>
        @if($submissions->count() > 0)
        <div style="overflow-x:auto;">
            <table class="act-table">
                <thead>
                    <tr>
                        <th>Universitas</th>
                        <th>Indikator</th>
                        <th>Nilai</th>
                        <th>Skor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $sub)
                    <tr>
                        <td class="td-bold-dark">{{ $sub->university->name ?? '-' }}</td>
                        <td class="td-truncate">{{ $sub->indicator->name ?? '-' }}</td>
                        <td>{{ $sub->value }}</td>
                        <td class="td-bold
                            @if($sub->score >= 70) ind-card-score-high
                            @elseif($sub->score >= 50) ind-card-score-mid
                            @else ind-card-score-low
                            @endif">{{ $sub->score }}</td>
                        <td><span class="badge badge-{{ $sub->status }}">{{ ucfirst($sub->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            Belum ada data submission terverifikasi untuk kategori ini.
        </div>
        @endif
    </div>

    <div class="dashboard-cta">
        <a href="{{ url('/admin') }}" target="_blank" class="btn-cta">
            📊 Lihat Data Lengkap di Dashboard
        </a>
    </div>

</div>

@push('scripts')
<script>
    // Terapkan warna dinamis dari data-color attribute
    document.querySelectorAll('.ind-dot[data-color]').forEach(el => {
        el.style.background = el.dataset.color;
    });
    document.querySelectorAll('.ind-card[data-color]').forEach(el => {
        el.style.borderLeft = '3px solid ' + el.dataset.color;
    });
</script>
@endpush

@endsection