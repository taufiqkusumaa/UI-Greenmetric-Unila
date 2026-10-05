{{-- Komponen brand logo navbar dan halaman login --}}
<div style="display:flex;align-items:center;gap:12px;">

    {{-- Logo UI GreenMetric --}}
    <img
        src="{{ asset('images/logo_greenmetric.png') }}"
        alt="UI GreenMetric"
        style="height:3rem;width:auto;object-fit:contain;"
    >

    {{-- Garis pemisah --}}
    <div style="width:1px;height:2.5rem;background:rgba(255,255,255,0.25);flex-shrink:0;"></div>

    {{-- Logo UNILA --}}
    <img
        src="{{ asset('images/logo_unila.png') }}"
        alt="Universitas Lampung"
        style="height:3rem;width:auto;object-fit:contain;"
    >

    {{-- Teks nama --}}
    <div style="display:flex;flex-direction:column;line-height:1.3;margin-left:4px;">
        <span style="font-size:15px;font-weight:700;color:#7dbb6e;font-family:Poppins,sans-serif;">
            UI GreenMetric
        </span>
        <span style="font-size:11px;font-weight:500;color:rgba(255,255,255,0.8);font-family:Poppins,sans-serif;">
            Universitas Lampung
        </span>
    </div>

</div>
