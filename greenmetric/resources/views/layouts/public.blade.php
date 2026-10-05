<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UI GreenMetric — Universitas Lampung')</title>

    {{-- CSS dari halaman child (home.blade.php, indikator.blade.php, dll) masuk di sini --}}
    @stack('styles')
</head>
<body>

    {{-- Konten dari halaman child masuk di sini --}}
    @yield('content')

    {{-- JS dari halaman child masuk di sini --}}
    @stack('scripts')
</body>
</html>