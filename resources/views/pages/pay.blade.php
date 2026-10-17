@extends('layouts.app')
@section('title', 'Pembayaran')
@section('content')
<div class="max-w-6xl mx-auto px-5 py-10 md:py-16">
    <div class="mb-8"><a href="{{ route('checkout', $order->product) }}" class="text-sm font-semibold text-slate-500 hover:text-[#3759d7]">← Kembali ke data pemesan</a><h1 class="font-display text-3xl md:text-4xl font-extrabold mt-4">Selesaikan pembayaran</h1><p class="text-slate-500 mt-2">Pilih cara pembayaran yang paling nyaman untukmu.</p></div>
    <div class="grid lg:grid-cols-[1fr_380px] gap-6 items-start">
        <form method="POST" action="{{ route('pay.simulate', $order) }}" class="bg-white border border-slate-100 rounded-[1.75rem] p-6 md:p-8 soft-shadow">
            @csrf
            <input type="hidden" name="result" value="success">
            <div class="flex items-center gap-3 mb-6"><span class="w-10 h-10 rounded-2xl bg-indigo-50 text-[#3759d7] flex items-center justify-center">▤</span><div><h2 class="font-display font-extrabold text-lg">Metode pembayaran</h2><p class="text-xs text-slate-500">Transaksi aman dan praktis</p></div></div>
            <div class="space-y-3">
                @foreach(['qris' => 'QRIS', 'va_bca' => 'Virtual Account BCA', 'va_bni' => 'Virtual Account BNI', 'gopay' => 'GoPay', 'card' => 'Kartu Kredit / Debit'] as $k => $label)
                    <label class="group flex items-center gap-4 border border-slate-200 rounded-2xl px-4 py-4 cursor-pointer transition hover:border-blue-300 has-[:checked]:border-[#3759d7] has-[:checked]:bg-indigo-50/70">
                        <input type="radio" name="method" value="{{ $k }}" required {{ $loop->first ? 'checked' : '' }} class="accent-[#3759d7] w-4 h-4">
                        <span class="w-10 h-10 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-xs font-extrabold text-[#3759d7]">{{ $k === 'qris' ? 'QR' : ($k === 'card' ? 'CC' : ($k === 'gopay' ? 'G' : 'VA')) }}</span>
                        <span class="font-semibold text-sm flex-1">{{ $label }}</span><span class="text-slate-300 group-has-[:checked]:text-[#3759d7]">●</span>
                    </label>
                @endforeach
            </div>
            <div class="flex items-center gap-2 mt-6 text-xs text-slate-500"><span class="text-emerald-600">◆</span> Pembayaran dilindungi dengan koneksi aman.</div>
            <button class="btn-primary rounded-xl w-full mt-5 py-4 font-bold text-base">Bayar Rp {{ number_format($order->gross_amount, 0, ',', '.') }} <span class="ml-1">→</span></button>
        </form>
        <aside class="bg-white border border-slate-100 rounded-[1.75rem] p-6 soft-shadow">
            <h2 class="font-display font-extrabold text-lg">Ringkasan pesanan</h2>
            <div class="flex gap-3 items-center mt-5 pb-5 border-b border-slate-100"><span class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-3xl overflow-hidden">@if($order->product->isSubscription()){{ $order->product->emoji }}@else<img src="{{ asset('images/products/'.$order->product->slug.'.webp') }}" alt="{{ $order->product->name }}" class="w-full h-full object-cover">@endif</span><div class="text-sm"><div class="font-bold">{{ $order->product->name }}</div><div class="text-slate-500 mt-1">{{ $order->qty }} item</div></div></div>
            <div class="flex justify-between text-sm text-slate-500 mt-5"><span>No. pesanan</span><span class="font-mono text-slate-700">{{ $order->order_id }}</span></div>
            <div class="flex justify-between text-sm text-slate-500 mt-3"><span>Subtotal</span><span>Rp {{ number_format($order->gross_amount, 0, ',', '.') }}</span></div>
            <div class="flex justify-between font-display font-extrabold text-lg mt-5 pt-4 border-t border-slate-100"><span>Total</span><span>Rp {{ number_format($order->gross_amount, 0, ',', '.') }}</span></div>
        </aside>
    </div>
</div>
@endsection
