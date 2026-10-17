@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
@php($input = 'w-full mt-1.5 border border-slate-200 bg-white rounded-xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-indigo-100 focus:border-[#3759d7] transition')
<div class="max-w-6xl mx-auto px-5 py-10 md:py-16">
    <div class="mb-8"><a href="{{ route('product', $product) }}" class="text-sm font-semibold text-slate-500 hover:text-[#3759d7]">← Kembali ke produk</a><div class="flex items-end justify-between mt-4"><div><p class="text-xs uppercase tracking-[.2em] font-bold text-[#3759d7]">LANGKAH 1 DARI 2</p><h1 class="font-display text-3xl md:text-4xl font-extrabold mt-2">Informasi pemesan</h1></div><div class="hidden sm:flex gap-2 items-center text-xs font-bold"><span class="w-7 h-7 rounded-full bg-[#3759d7] text-white flex items-center justify-center">1</span><span class="text-slate-400">Data</span><span class="w-8 h-px bg-slate-200"></span><span class="w-7 h-7 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center">2</span><span class="text-slate-400">Pembayaran</span></div></div></div>
    <div class="grid lg:grid-cols-[1fr_380px] gap-6 items-start">
        <form method="POST" action="{{ route('checkout.store', $product) }}" class="bg-white border border-slate-100 rounded-[1.75rem] p-6 md:p-8 soft-shadow space-y-5">
            @csrf
            @if($errors->any())<div class="bg-red-50 text-red-700 text-sm rounded-xl p-4">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>@endif
            <div><label class="text-sm font-bold">Nama lengkap</label><input name="customer_name" autocomplete="name" value="{{ old('customer_name') }}" required placeholder="Nama sesuai identitas" class="{{ $input }}"></div>
            <div class="grid sm:grid-cols-2 gap-5"><div><label class="text-sm font-bold">Alamat email</label><input type="email" name="customer_email" autocomplete="email" value="{{ old('customer_email') }}" required placeholder="nama@email.com" class="{{ $input }}"></div><div><label class="text-sm font-bold">Nomor WhatsApp</label><input name="customer_phone" autocomplete="tel" value="{{ old('customer_phone') }}" required placeholder="08xxxxxxxxxx" class="{{ $input }}"></div></div>
            @unless($product->isSubscription())
                <div><label class="text-sm font-bold">Alamat pengiriman</label><textarea name="customer_address" autocomplete="street-address" rows="3" required placeholder="Jalan, nomor rumah, kelurahan, kota, kode pos" class="{{ $input }}">{{ old('customer_address') }}</textarea></div>
                <div><label class="text-sm font-bold">Jumlah</label><input type="number" name="qty" min="1" max="50" value="{{ old('qty', 1) }}" id="qty" class="{{ $input }} max-w-32"></div>
            @endunless
            <button class="btn-primary rounded-xl w-full py-4 font-bold">Lanjut ke pembayaran <span class="ml-1">→</span></button>
            <p class="text-xs text-center text-slate-500">Dengan melanjutkan, Anda menyetujui <a class="underline" href="{{ route('terms') }}">Syarat &amp; Ketentuan</a>.</p>
        </form>
        <aside class="bg-white border border-slate-100 rounded-[1.75rem] p-6 soft-shadow sticky top-28">
            <h2 class="font-display font-extrabold text-lg">Pesanan Anda</h2>
            <div class="flex gap-4 items-center mt-5 pb-5 border-b border-slate-100"><span class="w-16 h-16 rounded-2xl bg-indigo-50 flex items-center justify-center text-4xl overflow-hidden">@if($product->isSubscription()){{ $product->emoji }}@else<img src="{{ asset('images/products/'.$product->slug.'.webp') }}" alt="{{ $product->name }}" class="w-full h-full object-cover">@endif</span><div class="text-sm"><div class="font-bold">{{ $product->name }}</div><div class="text-slate-500 mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}@if($product->period)/{{ $product->period }}@endif</div></div></div>
            <div class="flex justify-between text-sm text-slate-500 mt-5"><span>Subtotal</span><span>Rp <span id="total">{{ number_format($product->price, 0, ',', '.') }}</span></span></div>
            <div class="flex justify-between font-display font-extrabold text-lg mt-4 pt-4 border-t border-slate-100"><span>Total</span><span>Rp <span>{{ number_format($product->price, 0, ',', '.') }}</span></span></div>
            <div class="mt-5 flex items-center gap-2 text-xs text-slate-500"><span class="text-emerald-600">✓</span> Informasi Anda dijaga dengan aman.</div>
        </aside>
    </div>
</div>
@unless($product->isSubscription())
<script>
    const q = document.getElementById('qty'), price = {{ $product->price }};
    q.addEventListener('input', () => { const total = (price * Math.max(1, +q.value || 1)).toLocaleString('id-ID'); document.querySelectorAll('#total').forEach(el => el.textContent = total); });
</script>
@endunless
@endsection
