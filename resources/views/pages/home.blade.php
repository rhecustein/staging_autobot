@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
<section class="max-w-7xl mx-auto px-5 pt-8 md:pt-12">
    <div class="relative overflow-hidden rounded-[2rem] bg-[#e8edff] min-h-[480px] flex items-center">
        <div class="absolute inset-0 bg-gradient-to-r from-[#e8edff] via-[#e8edff]/95 to-transparent z-[1]"></div>
        <div class="absolute right-0 inset-y-0 w-full md:w-[67%] bg-[url('/images/autobot-hero.webp')] bg-cover bg-center"></div>
        <div class="relative z-[2] max-w-xl px-7 py-14 md:pl-14 md:py-20">
            <div class="inline-flex items-center gap-2 rounded-full bg-white/80 px-3.5 py-2 text-xs font-bold tracking-wide text-[#3759d7] shadow-sm"><span class="w-2 h-2 bg-emerald-400 rounded-full"></span> IDE BESAR, LANGKAH LEBIH RINGKAS</div>
            <h1 class="font-display text-4xl md:text-6xl font-extrabold leading-[1.08] tracking-tight mt-6">Buat harimu<br>bergerak <span class="text-[#3759d7]">lebih cerdas.</span></h1>
            <p class="mt-5 text-slate-600 text-base md:text-lg leading-7 max-w-lg">Temukan aksesori penuh karakter dan layanan otomasi yang membuat rutinitas terasa lebih ringan.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="#produk" class="btn-primary rounded-full px-6 py-3.5 font-bold">Jelajahi produk <span class="ml-2">↗</span></a>
                <a href="{{ route('subscriptions') }}" class="rounded-full bg-white text-slate-800 px-6 py-3.5 font-bold hover:bg-slate-50">Lihat paket</a>
            </div>
            <div class="mt-9 flex items-center gap-3 text-sm text-slate-600"><span class="flex -space-x-2"><i class="w-8 h-8 rounded-full bg-blue-200 border-2 border-[#e8edff]"></i><i class="w-8 h-8 rounded-full bg-violet-200 border-2 border-[#e8edff]"></i><i class="w-8 h-8 rounded-full bg-amber-200 border-2 border-[#e8edff]"></i></span><span><b class="text-slate-900">Pilihan untuk ide-ide baik</b><br>Mulai dari hal kecil hari ini.</span></div>
        </div>
        <div class="absolute bottom-6 right-7 z-[2] rounded-2xl bg-white/90 backdrop-blur px-4 py-3 shadow-lg hidden md:block"><div class="text-[10px] uppercase tracking-[.18em] text-slate-400 font-bold">AUTOMATE THE ORDINARY</div><div class="font-display font-bold mt-1">Lebih banyak waktu untuk hal penting.</div></div>
    </div>
</section>
<section id="produk" class="max-w-7xl mx-auto px-5 pt-16">
    <div class="flex items-end justify-between gap-4 mb-7"><div><p class="text-xs uppercase tracking-[.2em] font-bold text-[#3759d7]">KURASI AUTOBOT</p><h2 class="font-display text-3xl md:text-4xl font-extrabold mt-2">Produk pilihan</h2></div><span class="text-sm text-slate-500">Dibuat untuk menemani keseharianmu</span></div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @foreach($products as $p) @include('pages._card', ['p' => $p]) @endforeach
    </div>
</section>
<section class="max-w-7xl mx-auto px-5 pt-16">
    <div class="relative overflow-hidden rounded-[2rem] bg-[#17264d] text-white p-7 md:p-11">
        <div class="absolute w-72 h-72 rounded-full bg-blue-500/20 blur-3xl -right-10 -top-20"></div>
        <div class="relative flex flex-col md:flex-row md:items-end justify-between gap-5 mb-8"><div><p class="text-xs uppercase tracking-[.2em] font-bold text-blue-300">OTOMASI UNTUK SEMUA</p><h2 class="font-display text-3xl md:text-4xl font-extrabold mt-2">Pilih ritme kerjamu.</h2><p class="text-slate-300 mt-2">Paket fleksibel untuk membuat lebih banyak hal berjalan otomatis.</p></div><a href="{{ route('subscriptions') }}" class="text-sm font-bold text-blue-200 hover:text-white">Bandingkan paket <span class="ml-1">↗</span></a></div>
        <div class="relative grid md:grid-cols-3 gap-4">
            @foreach($plans as $p) @include('pages._card', ['p' => $p]) @endforeach
        </div>
    </div>
</section>
@endsection
