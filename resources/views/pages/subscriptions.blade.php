@extends('layouts.app')
@section('title', 'Paket Langganan')
@section('content')
<section class="max-w-7xl mx-auto px-5 py-14 md:py-20">
    <div class="max-w-2xl mx-auto text-center"><p class="text-xs uppercase tracking-[.2em] font-bold text-[#3759d7]">LANGKAH CERDAS BERIKUTNYA</p><h1 class="font-display text-4xl md:text-5xl font-extrabold mt-3">Paket yang pas<br>untuk ritmemu.</h1><p class="text-slate-500 mt-4 leading-7">Pilih dukungan otomasi yang sesuai kebutuhan. Setiap paket berlaku satu bulan dan bisa dipilih kembali kapan saja.</p></div>
    <div class="grid md:grid-cols-3 gap-5 mt-12 max-w-5xl mx-auto">
        @foreach($plans as $p)
        <div class="relative bg-white rounded-[1.75rem] border border-slate-100 p-7 flex flex-col soft-shadow {{ $p->slug === 'langganan-pro' ? 'ring-2 ring-[#3759d7] md:-translate-y-2' : '' }}">
            @if($p->slug === 'langganan-pro')<span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-[#3759d7] text-white text-[10px] font-extrabold tracking-widest px-4 py-1.5">PALING POPULER</span>@endif
            <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-3xl">{{ $p->emoji }}</div>
            <h2 class="font-display text-xl font-extrabold mt-5">{{ $p->name }}</h2><p class="text-sm text-slate-500 mt-2 leading-5">{{ $p->description }}</p>
            <div class="font-display text-3xl font-extrabold text-[#3759d7] mt-6">Rp {{ number_format($p->price, 0, ',', '.') }}<span class="text-sm font-medium text-slate-500">/{{ $p->period }}</span></div>
            <ul class="mt-6 space-y-3 text-sm flex-1">@foreach($p->features as $f)<li class="flex gap-3"><span class="text-emerald-500 font-bold">✓</span><span class="text-slate-600">{{ $f }}</span></li>@endforeach</ul>
            <a href="{{ route('checkout', $p) }}" class="{{ $p->slug === 'langganan-pro' ? 'btn-primary' : 'bg-indigo-50 text-[#3759d7] hover:bg-indigo-100' }} mt-7 text-center font-bold py-3.5 rounded-xl transition">Pilih paket <span class="ml-1">→</span></a>
        </div>
        @endforeach
    </div>
</section>
@endsection
