<a href="{{ route('product', $p) }}" class="group bg-white rounded-3xl border border-slate-100 hover:border-blue-200 hover:-translate-y-1 transition duration-300 overflow-hidden flex flex-col shadow-sm hover:shadow-xl hover:shadow-blue-950/10">
    <div class="relative h-44 bg-gradient-to-br from-[#edf1ff] via-[#f7f8fc] to-[#e6f6fb] flex items-center justify-center overflow-hidden">
        @if($p->isSubscription())
            <div class="absolute w-32 h-32 rounded-full bg-white/80 blur-xl group-hover:scale-125 transition duration-500"></div>
            <span class="relative text-7xl drop-shadow-sm group-hover:scale-110 group-hover:-rotate-6 transition duration-300">{{ $p->emoji }}</span>
        @else
            <img src="{{ asset('images/products/'.$p->slug.'.webp') }}" alt="{{ $p->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        @endif
        <span class="absolute top-3 left-3 text-[10px] uppercase tracking-wider font-extrabold rounded-full px-3 py-1 bg-white/90 text-slate-500">{{ $p->isSubscription() ? 'Otomasi' : 'Merchandise' }}</span>
    </div>
    <div class="p-5 flex-1 flex flex-col">
        <h3 class="font-display font-bold group-hover:text-[#3759d7]">{{ $p->name }}</h3>
        <p class="text-sm text-slate-500 mt-2 leading-5 line-clamp-2 flex-1">{{ $p->description }}</p>
        <div class="mt-5 flex items-center justify-between">
            <span class="font-display font-extrabold text-slate-900">Rp {{ number_format($p->price, 0, ',', '.') }}@if($p->period)<span class="text-xs font-medium text-slate-500">/{{ $p->period }}</span>@endif</span>
            <span class="w-9 h-9 rounded-full bg-[#eef2ff] text-[#3759d7] flex items-center justify-center font-bold group-hover:bg-[#3759d7] group-hover:text-white transition">↗</span>
        </div>
    </div>
</a>
