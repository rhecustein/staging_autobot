@extends('layouts.app')
@section('title', 'Kebijakan Privasi')
@section('content')
<article class="max-w-3xl mx-auto px-4 pt-12 space-y-4 text-slate-700 leading-relaxed">
    <h1 class="text-3xl font-bold text-slate-900">Kebijakan Privasi</h1>
    <p class="text-sm text-slate-500">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p>
    <h2 class="text-xl font-semibold text-slate-900 pt-4">Data yang Kami Kumpulkan</h2>
    <p>Nama, email, nomor telepon, dan alamat pengiriman yang Anda isi saat memesan, serta data transaksi.</p>
    <h2 class="text-xl font-semibold text-slate-900 pt-4">Penggunaan Data</h2>
    <p>Data digunakan untuk memproses pesanan, pengiriman, pembayaran, dan layanan pelanggan. Kami tidak menjual data Anda kepada pihak ketiga.</p>
    <h2 class="text-xl font-semibold text-slate-900 pt-4">Keamanan</h2>
    <p>Kami menjaga data dengan langkah keamanan yang wajar. Data kartu tidak disimpan di server kami.</p>
    <h2 class="text-xl font-semibold text-slate-900 pt-4">Kontak</h2>
    <p>Permintaan akses atau penghapusan data: <a class="text-indigo-600 underline" href="mailto:{{ config('business.email') }}">{{ config('business.email') }}</a>.</p>
</article>
@endsection
