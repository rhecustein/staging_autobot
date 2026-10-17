@extends('layouts.app')
@section('title', $product->name)
@section('description', $product->description)
@section('content')
<div class="max-w-6xl mx-auto px-5 py-10 md:py-16">
    <a href="{{ route('home') }}#produk" class="text-sm font-semibold text-slate-500 hover:text-[#3759d7]">← Kembali ke produk</a>
    <div class="grid md:grid-cols-2 gap-8 md:gap-14 mt-6 items-center">
        <div class="relative min-h-[360px] md:min-h-[500px] rounded-[2rem] bg-gradient-to-br from-[#e8edff] via-white to-[#dcf6f5] flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/products/'.$product->slug.'.webp') }}" alt="{{ $product->name }}" class="absolute inset-0 w-full h-full object-cover">
            <span class="absolute left-6 top-6 rounded-full bg-white/90 px-4 py-2 text-xs font-bold text-[#3759d7]">{{ $product->isSubscription() ? 'LAYANAN AUTOBOT' : 'KOLEKSI AUTOBOT' }}</span>
        </div>
        <div class="py-4"><p class="text-xs uppercase tracking-[.2em] font-bold text-[#3759d7]">{{ $product->isSubscription() ? 'PAKET LANGGANAN' : 'MERCHANDISE PILIHAN' }}</p><h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight mt-3">{{ $product->name }}</h1>
            <div class="font-display text-3xl font-extrabold text-[#3759d7] mt-5">Rp {{ number_format($product->price, 0, ',', '.') }}@if($product->period)<span class="text-base font-semibold text-slate-500">/{{ $product->period }}</span>@endif</div>
            <p class="mt-5 text-slate-600 leading-7">{{ $product->description }}</p>
            @if($product->features)
                <ul class="mt-6 space-y-3 text-sm text-slate-700">@foreach($product->features as $f)<li class="flex gap-3"><span class="text-emerald-500 font-bold">✓</span><span>{{ $f }}</span></li>@endforeach</ul>
            @else
                <ul class="mt-6 space-y-3 text-sm text-slate-700"><li class="flex gap-3"><span class="text-emerald-500 font-bold">✓</span><span>Dikirim ke seluruh Indonesia</span></li><li class="flex gap-3"><span class="text-emerald-500 font-bold">✓</span><span>Garansi tukar untuk kerusakan produksi</span></li></ul>
            @endif
            <a href="{{ route('checkout', $product) }}" class="btn-primary inline-flex items-center justify-center mt-8 rounded-xl px-8 py-4 font-bold">{{ $product->isSubscription() ? 'Pilih paket ini' : 'Tambahkan ke pesanan' }} <span class="ml-2">→</span></a>
            <p class="text-xs text-slate-500 mt-4">Dengan melanjutkan, Anda menyetujui <a class="underline" href="{{ route('terms') }}">Syarat &amp; Ketentuan</a> dan <a class="underline" href="{{ route('refund') }}">Kebijakan Pengembalian</a>.</p>
        </div>
    </div>
</div>
@endsection
