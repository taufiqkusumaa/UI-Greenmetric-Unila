@extends('layouts.app')

@section('title', 'UI GreenMetric UNILA - Sustainable Campus Initiative')

@section('content')
    <!-- Hero Section (Tata letak Modern ala Template Kanan) -->
    <section class="max-w-7xl mx-auto px-6 pt-16 pb-20 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7 space-y-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-yellow-50 border border-brand-gold/40 text-xs font-bold text-brand-black tracking-wide">
                <span class="w-2 h-2 rounded-full bg-brand-green"></span>
                STRATEGY. GROWTH. SUSTAINABILITY.
            </div>
            
            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-brand-black leading-tight">
                Advancing Sustainability <br>
                <span class="italic font-normal text-brand-slate">for a Greener</span> 
                <span class="underline decoration-brand-gold decoration-4 underline-offset-8 text-brand-green">Campus</span>
            </h1>

            <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-xl">
                Universitas Lampung berkomitmen membangun kampus berkelanjutan melalui pengukuran dan peningkatan indikator GreenMetric secara terstruktur, transparan, dan berbasis data mutakhir.
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="#kategori" class="bg-brand-black text-white px-8 py-3.5 rounded-lg font-semibold hover:bg-brand-slate transition-all shadow-md flex items-center gap-2 group border-l-4 border-brand-gold">
                    Lihat Indikator 
                    <i class="fa-solid fa-arrow-right text-xs text-brand-gold group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="" class="bg-white text-gray-800 border border-gray-300 px-8 py-3.5 rounded-lg font-semibold hover:bg-gray-50 transition-all flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-chart-line text-brand-green"></i> Buka Dashboard
                </a>
            </div>
        </div>

        <!-- Kolom Visual Kanan -->
        <div class="lg:col-span-5 relative">
            <div class="w-full h-[420px] rounded-3xl overflow-hidden shadow-2xl relative border-4 border-white">
                <img src="https://images.unsplash.com/photo-1519452635265-7b1fbfd1e4e0?q=80&w=1000&auto=format&fit=crop" alt="Campus Architecture" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-black/80 via-transparent to-transparent"></div>
                
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-white/90 backdrop-blur-md border-l-4 border-brand-green shadow-lg">
                    <p class="text-xs font-bold text-brand-slate uppercase tracking-wider">Komitmen Kampus 2026</p>
                    <p class="text-sm font-semibold text-brand-black">Akselerasi Pengurangan Emisi Karbon & Efisiensi Energi Terbarukan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4-Pillars Dark Strip (#000000 & #2F4F4F) -->
    <section class="bg-brand-black text-white py-14 border-y-2 border-brand-gold">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-brand-slate flex items-center justify-center shrink-0 border border-brand-gold/50">
                    <i class="fa-solid fa-chart-pie text-brand-gold text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-white">Data-Driven Policy</h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">Pengukuran indikator berbasis data empiris real-time dan transparan.</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-brand-slate flex items-center justify-center shrink-0 border border-brand-gold/50">
                    <i class="fa-solid fa-arrows-spin text-brand-gold text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-white">Continuous Growth</h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">Target peningkatan skor tahunan secara terukur dan berkesinambungan.</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-brand-slate flex items-center justify-center shrink-0 border border-brand-gold/50">
                    <i class="fa-solid fa-users text-brand-gold text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-white">Cross Collaboration</h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">Kolaborasi lintas fakultas, biro, serta unit riset di seluruh UNILA.</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-brand-slate flex items-center justify-center shrink-0 border border-brand-gold/50">
                    <i class="fa-solid fa-earth-americas text-brand-gold text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-white">Global Goals (SDGs)</h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">Berkontribusi langsung pada pencapaian agenda hijau dunia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About & Counter Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-4">
                <span class="text-xs font-bold text-brand-slate uppercase tracking-widest border-b-2 border-brand-gold pb-1 inline-block">Tentang Program</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-brand-black">Komitmen Nyata Menuju Kampus Lestari Berstandar Internasional</h2>
                <p class="text-gray-600 text-sm leading-relaxed">
                    UI GreenMetric World University Rankings adalah sistem pemeringkatan universitas berbasis keberlanjutan lingkungan yang dikembangkan oleh Universitas Indonesia sejak tahun 2010. UNILA aktif berpartisipasi untuk terus meningkatkan skor dan implementasi nyata di lingkungan kampus.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                        <i class="fa-solid fa-circle-check text-brand-green"></i> 6 Kategori Penilaian Mutakhir
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                        <i class="fa-solid fa-circle-check text-brand-green"></i> Kolaborasi Terbuka Lintas Sektor
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                        <i class="fa-solid fa-circle-check text-brand-green"></i> Evaluasi Emisi Karbon Terpadu
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                        <i class="fa-solid fa-circle-check text-brand-green"></i> Adaptasi SDGs PBB 2030
                    </div>
                </div>
            </div>

            <!-- Counter Cards -->
            <div class="lg:col-span-6 grid grid-cols-2 gap-4">
                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 text-center hover:shadow-lg transition-shadow border-t-4 border-brand-slate">
                    <div class="text-4xl font-extrabold text-brand-black">6</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-500 mt-2">Kategori Utama</div>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 text-center hover:shadow-lg transition-shadow border-t-4 border-brand-gold">
                    <div class="text-4xl font-extrabold text-brand-black">29</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-500 mt-2">Indikator Detail</div>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 text-center hover:shadow-lg transition-shadow border-t-4 border-brand-green">
                    <div class="text-4xl font-extrabold text-brand-black">100%</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-500 mt-2">Komitmen Institusi</div>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 text-center hover:shadow-lg transition-shadow border-t-4 border-brand-red">
                    <div class="text-4xl font-extrabold text-brand-black">20+</div>
                    <div class="text-xs font-bold uppercase tracking-wider text-gray-500 mt-2">Data Terverifikasi</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6 Categories Section (Blade Loop) -->
    <section id="kategori" class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-bold text-brand-slate uppercase tracking-widest border-b-2 border-brand-gold pb-1 inline-block">6 Kategori Penilaian</span>
                    <h2 class="font-serif text-3xl font-bold text-brand-black mt-2">Indikator UI GreenMetric UNILA</h2>
                    <p class="text-sm text-gray-500 mt-1">Setiap kategori mengukur aspek keberlanjutan berbeda dengan bobot resmi internasional.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-brand-slate text-brand-gold text-xs font-bold rounded-lg">
                        <i class="fa-solid fa-scale-balanced"></i> Total Bobot: 100%
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $cat)
                <div class="bg-white rounded-2xl p-7 border border-gray-200 shadow-sm hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between border-t-4 hover:border-brand-gold">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <span class="w-12 h-12 rounded-xl bg-brand-black text-brand-gold font-bold text-base flex items-center justify-center shadow-md">
                                {{ $cat['code'] }}
                            </span>
                            <span class="px-3 py-1 bg-yellow-100 text-brand-black text-xs font-extrabold rounded-full border border-brand-gold/40">
                                Bobot: {{ $cat['weight'] }}
                            </span>
                        </div>
                        <h3 class="font-bold text-lg text-brand-black mb-2 group-hover:text-brand-green transition-colors">
                            {{ $cat['title'] }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ $cat['desc'] }}
                        </p>
                    </div>

                    <div class="pt-6 mt-6 border-t border-gray-100 flex items-center justify-between text-xs">
                        <span class="text-gray-400 font-medium">{{ $cat['sub'] }}</span>
                        <a href="#modal-detail" class="font-bold text-brand-black group-hover:text-brand-green flex items-center gap-1">
                            Lihat Detail &rarr;
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Rankings & Tim Section (2 Kolom) -->
    <section id="peringkat" class="py-20 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Kolom Tabel Ranking -->
            <div class="lg:col-span-7">
                <div class="mb-6">
                    <span class="text-xs font-bold text-brand-slate uppercase tracking-widest border-b-2 border-brand-gold pb-1 inline-block">Benchmarking</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-brand-black mt-2">Top Universitas GreenMetric</h2>
                    <p class="text-xs text-gray-500 mt-1">Daftar universitas dengan skor GreenMetric tertinggi berdasarkan data terkini.</p>
                </div>

                <div class="overflow-hidden rounded-2xl border border-gray-200 shadow-sm bg-white">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-brand-black text-white text-xs uppercase tracking-wider border-b-2 border-brand-gold">
                            <tr>
                                <th class="py-3.5 px-4 font-bold">Rank</th>
                                <th class="py-3.5 px-4 font-bold">Universitas</th>
                                <th class="py-3.5 px-4 font-bold">Negara</th>
                                <th class="py-3.5 px-4 font-bold text-right">Skor</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 font-medium">
                            @foreach ($rankings as $row)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-3.5 px-4 font-bold text-brand-slate">
                                    <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs font-extrabold text-brand-black">
                                        {{ $row['rank'] }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-brand-black font-semibold">{{ $row['name'] }}</td>
                                <td class="py-3.5 px-4 text-gray-500">{{ $row['country'] }}</td>
                                <td class="py-3.5 px-4 text-right font-bold text-brand-green">{{ $row['score'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kolom Tim Inti (ID: tim) -->
            <div id="tim" class="lg:col-span-5">
                <div class="mb-6">
                    <span class="text-xs font-bold text-brand-slate uppercase tracking-widest border-b-2 border-brand-gold pb-1 inline-block">Struktur Organisasi</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-brand-black mt-2">Anggota Tim Inti UNILA</h2>
                    <p class="text-xs text-gray-500 mt-1">Tim yang berdedikasi mengimplementasikan program keberlanjutan kampus.</p>
                </div>

                <div class="space-y-3">
                    @foreach ($teams as $member)
                    <div class="p-3.5 rounded-xl border border-gray-200 bg-gray-50 hover:bg-white hover:shadow-md transition-all flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-brand-slate text-brand-gold font-bold text-sm flex items-center justify-center shrink-0 border border-brand-gold/40">
                            {{ $member['initials'] }}
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="font-bold text-sm text-brand-black truncate">{{ $member['name'] }}</h4>
                            <p class="text-xs text-brand-green font-semibold">{{ $member['role'] }}</p>
                            <span class="text-[11px] text-gray-400">{{ $member['dept'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection