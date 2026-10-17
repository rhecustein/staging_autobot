@extends('layouts.app')
@section('title', 'Syarat & Ketentuan')
@section('content')
<article class="max-w-3xl mx-auto px-4 pt-12 space-y-4 text-slate-700 leading-relaxed">
    <h1 class="text-3xl font-bold text-slate-900">Syarat &amp; Ketentuan</h1>
    <p class="text-sm text-slate-500">Terakhir diperbarui: {{ now()->translatedFormat('d F Y') }}</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">1. Umum</h2>
    <p>Dengan mengakses dan melakukan pemesanan di website ini, Anda menyetujui syarat dan ketentuan berikut. {{ config('business.name') }} ("Kami") menyediakan produk fisik (merchandise) dan layanan langganan digital.</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">2. Produk, Layanan &amp; Harga</h2>
    <p>Seluruh harga ditampilkan dan ditagihkan dalam Rupiah (IDR) dan sudah termasuk pajak yang berlaku, kecuali dinyatakan lain. Ongkos kirim (jika ada) ditampilkan sebelum pembayaran. Kami berhak mengubah harga dan deskripsi produk sewaktu-waktu tanpa memengaruhi pesanan yang telah dibayar.</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">3. Pemesanan &amp; Pembayaran</h2>
    <ul class="list-disc pl-6 space-y-1">
        <li>Pesanan dianggap sah setelah pembayaran diterima dan terkonfirmasi.</li>
        <li>Pembayaran dilakukan melalui halaman pembayaran di website ini menggunakan metode yang tersedia (QRIS, Virtual Account, e-wallet, kartu).</li>
        <li>Pesanan yang tidak dibayar dalam 24 jam akan dibatalkan otomatis.</li>
    </ul>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">4. Pengiriman Produk Fisik</h2>
    <p>Pesanan diproses 1–3 hari kerja setelah pembayaran terkonfirmasi. Estimasi pengiriman 2–7 hari kerja tergantung lokasi dan jasa kurir. Produk custom memerlukan waktu produksi tambahan 3–5 hari kerja.</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">5. Langganan</h2>
    <p>Langganan berlaku untuk periode 1 (satu) bulan sejak pembayaran terkonfirmasi dan tidak diperpanjang otomatis. Untuk melanjutkan, pelanggan melakukan pemesanan kembali sebelum masa aktif berakhir.</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">6. Pengembalian</h2>
    <p>Ketentuan pengembalian produk dan dana diatur dalam <a class="text-indigo-600 underline" href="{{ route('refund') }}">Kebijakan Pengembalian Dana &amp; Produk</a>.</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">7. Batasan Tanggung Jawab</h2>
    <p>Kami tidak bertanggung jawab atas keterlambatan yang disebabkan oleh pihak ketiga (kurir, penyedia pembayaran) atau keadaan di luar kendali kami.</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">8. Hukum yang Berlaku</h2>
    <p>Syarat dan ketentuan ini tunduk pada hukum Republik Indonesia.</p>

    <h2 class="text-xl font-semibold text-slate-900 pt-4">9. Kontak</h2>
    <p>Pertanyaan dapat disampaikan ke <a class="text-indigo-600 underline" href="mailto:{{ config('business.email') }}">{{ config('business.email') }}</a>.</p>
</article>
@endsection
