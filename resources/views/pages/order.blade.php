@extends('layouts.app')
@section('title', 'Status Pesanan')
@section('content')
@php
    $map = [
        'paid' => ['Pembayaran berhasil', 'bg-emerald-50 text-emerald-700', '✓', 'Pesananmu sudah kami terima dan sedang disiapkan.'],
        'failed' => ['Pembayaran belum berhasil', 'bg-rose-50 text-rose-700', '!', 'Silakan coba lagi dengan metode pembayaran yang berbeda.'],
        'pending' => ['Menunggu pembayaran', 'bg-amber-50 text-amber-700', '…', 'Selesaikan pembayaran untuk melanjutkan pesananmu.'],
    ];
    [$label, $cls, $icon, $message] = $map[$order->status] ?? $map['pending'];
@endphp
<div class="max-w-3xl mx-auto px-5 py-10 md:py-16">
    <div class="bg-white border border-slate-100 rounded-[2rem] overflow-hidden soft-shadow">
        <div class="text-center px-6 py-10 md:py-12 bg-gradient-to-b from-indigo-50/80 to-white"><div class="mx-auto w-16 h-16 rounded-full {{ $cls }} flex items-center justify-center text-3xl font-bold">{{ $icon }}</div><span class="inline-flex mt-5 px-4 py-2 rounded-full text-xs font-extrabold uppercase tracking-wider {{ $cls }}">{{ $label }}</span><h1 class="font-display text-3xl font-extrabold mt-4">{{ $order->status === 'paid' ? 'Terima kasih atas pesananmu!' : 'Pesanan #'.$order->order_id }}</h1><p class="text-slate-500 mt-2">{{ $message }}</p></div>
        <div class="px-6 md:px-10 pb-8">
            <div class="flex items-center gap-4 py-5 border-y border-slate-100"><span class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-3xl overflow-hidden">@if($order->product->isSubscription()){{ $order->product->emoji }}@else<img src="{{ asset('images/products/'.$order->product->slug.'.webp') }}" alt="{{ $order->product->name }}" class="w-full h-full object-cover">@endif</span><div class="flex-1"><div class="font-bold">{{ $order->product->name }}</div><div class="text-sm text-slate-500 mt-1">{{ $order->qty }} item</div></div><div class="font-display font-extrabold">Rp {{ number_format($order->gross_amount, 0, ',', '.') }}</div></div>
            <dl class="grid sm:grid-cols-2 gap-x-8 text-sm mt-5">
                <div class="flex justify-between py-2"><dt class="text-slate-500">Nomor pesanan</dt><dd class="font-mono">{{ $order->order_id }}</dd></div>
                <div class="flex justify-between py-2"><dt class="text-slate-500">Pemesan</dt><dd>{{ $order->customer_name }}</dd></div>
                <div class="flex justify-between py-2"><dt class="text-slate-500">Email</dt><dd>{{ $order->customer_email }}</dd></div>
                @if($order->payment_method)<div class="flex justify-between py-2"><dt class="text-slate-500">Metode</dt><dd>{{ strtoupper(str_replace('_', ' ', $order->payment_method)) }}</dd></div>@endif
                @if($order->paid_at)<div class="flex justify-between py-2"><dt class="text-slate-500">Waktu pembayaran</dt><dd>{{ $order->paid_at->translatedFormat('d M Y H:i') }}</dd></div>@endif
            </dl>
            <div class="mt-7 flex flex-col sm:flex-row gap-3 justify-center">
                @if($order->status === 'pending')<a href="{{ route('pay', $order) }}" class="btn-primary text-center px-6 py-3 rounded-xl font-bold">Bayar sekarang →</a>
                @elseif($order->status === 'failed')<a href="{{ route('checkout', $order->product) }}" class="btn-primary text-center px-6 py-3 rounded-xl font-bold">Coba lagi →</a>@endif
                <a href="{{ route('home') }}" class="border border-slate-200 text-center px-6 py-3 rounded-xl font-bold hover:bg-slate-50">Kembali ke beranda</a>
            </div>
            <p class="text-xs text-slate-500 text-center mt-5">Perlu bantuan? <a class="underline" href="mailto:{{ config('business.email') }}">Hubungi tim kami</a>.</p>
        </div>
    </div>
</div>
@endsection
