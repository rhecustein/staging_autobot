@extends('layouts.app')
@section('title', 'Kebijakan Pengembalian Dana & Produk')
@section('content')
<article class="max-w-3xl mx-auto px-4 pt-12 space-y-4 text-slate-700 leading-relaxed">
    <h1 class="text-3xl font-bold text-slate-900">Kebijakan Pengembalian Dana &amp; Produk</h1>
    <p class="text-sm text-slate-500">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">1. Produk Fisik</h2>
    <ul class="list-disc pl-6 space-y-1">
        <li>Pengajuan retur/tukar maksimal <strong>7 hari</strong> setelah barang diterima.</li>
        <li>Berlaku jika produk rusak, cacat produksi, salah kirim, atau tidak sesuai pesanan.</li>
        <li>Sertakan foto/video unboxing dan nomor pesanan ke <a class="text-indigo-600 underline" href="mailto:{{ config('business.email') }}">{{ config('business.email') }}</a>.</li>
        <li>Produk harus belum dipakai dan dalam kondisi asli.</li>
        <li>Produk custom (nama/desain pesanan) tidak dapat dikembalikan kecuali terdapat kesalahan dari pihak kami.</li>
    </ul>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">2. Langganan</h2>
    <ul class="list-disc pl-6 space-y-1">
        <li>Pengembalian dana penuh dapat diajukan dalam <strong>3 hari</strong> sejak pembayaran selama layanan belum digunakan secara signifikan.</li>
        <li>Setelah periode tersebut, biaya langganan berjalan tidak dapat dikembalikan.</li>
        <li>Langganan tidak diperpanjang otomatis sehingga tidak ada penagihan berulang.</li>
    </ul>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">3. Pengembalian Dana</h2>
    <ul class="list-disc pl-6 space-y-1">
        <li>Pengajuan ditinjau dalam 1–3 hari kerja.</li>
        <li>Dana yang disetujui dikembalikan melalui metode pembayaran awal atau transfer bank, dalam 7–14 hari kerja.</li>
        <li>Pembayaran ganda atau pembayaran gagal yang terpotong dikembalikan penuh.</li>
        <li>Pesanan yang kami batalkan (stok habis, dll.) dikembalikan 100%.</li>
    </ul>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">4. Cara Mengajukan</h2>
    <p>Hubungi kami melalui email {{ config('business.email') }} atau WhatsApp {{ config('business.phone') }} dengan menyertakan nomor pesanan, nama, dan alasan pengajuan.</p>
</article>
@endsection
