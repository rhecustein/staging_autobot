<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Autobot') — Autobot</title>
    <meta name="description" content="@yield('description', 'Merchandise kreatif dan layanan otomasi dari Autobot.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --ink: #15213a; --blue: #3759d7; --mist: #f4f6fb; }
        body { font-family: 'DM Sans', sans-serif; color: var(--ink); background: var(--mist); }
        h1,h2,h3,.font-display { font-family: 'Manrope', sans-serif; }
        .btn-primary { background: var(--blue); color: white; transition: .2s ease; }
        .btn-primary:hover { background: #2948bd; transform: translateY(-1px); }
        .soft-shadow { box-shadow: 0 20px 60px rgba(30, 48, 91, .08); }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased">
<header class="sticky top-0 z-20 border-b border-slate-200/70 bg-white/90 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-5 h-[76px] flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-2xl bg-[#3759d7] text-white flex items-center justify-center text-xl shadow-lg shadow-blue-200">✳</span>
            <span class="font-display text-xl font-extrabold tracking-tight">autobot<span class="text-[#3759d7]">.</span></span>
        </a>
        <nav class="hidden md:flex items-center gap-9 text-sm font-semibold text-slate-600">
            <a href="{{ route('home') }}#produk" class="hover:text-[#3759d7]">Produk</a>
            <a href="{{ route('subscriptions') }}" class="hover:text-[#3759d7]">Langganan</a>
            <a href="{{ route('contact') }}" class="hover:text-[#3759d7]">Kontak</a>
        </nav>
        <a href="{{ route('home') }}#produk" class="btn-primary rounded-full px-5 py-2.5 text-sm font-bold">Mulai belanja <span class="ml-1">↗</span></a>
    </div>
</header>
<div class="bg-[#eef2ff] border-b border-indigo-100 text-indigo-900 text-xs text-center px-4 py-2">Mode pratinjau transaksi · Tidak ada tagihan yang diproses</div>
<main class="flex-1">@yield('content')</main>
<footer class="bg-[#15213a] text-slate-300 mt-20">
    <div class="max-w-7xl mx-auto px-5 py-12 grid gap-10 md:grid-cols-3 text-sm">
        <div>
            <div class="text-white font-display font-extrabold text-xl mb-3">{{ config('business.name') }}</div>
            <p class="max-w-sm text-slate-400 leading-6">Merchandise pilihan dan layanan otomasi untuk membantu ide bergerak lebih jauh.</p>
        </div>
        <div>
            <div class="text-white font-bold mb-3">Informasi</div>
            <ul class="space-y-2 text-slate-400">
                <li><a class="hover:text-white" href="{{ route('terms') }}">Syarat &amp; Ketentuan</a></li>
                <li><a class="hover:text-white" href="{{ route('refund') }}">Pengembalian Dana &amp; Produk</a></li>
                <li><a class="hover:text-white" href="{{ route('privacy') }}">Kebijakan Privasi</a></li>
                <li><a class="hover:text-white" href="{{ route('contact') }}">Hubungi Kami</a></li>
            </ul>
        </div>
        <div>
            <div class="text-white font-bold mb-3">Kontak</div>
            <ul class="space-y-2 text-slate-400">
                <li>{{ config('business.address') }}</li>
                <li><a class="hover:text-white" href="mailto:{{ config('business.email') }}">{{ config('business.email') }}</a></li>
                <li>{{ config('business.phone') }}</li>
            </ul>
        </div>
    </div>
    <div class="border-t border-white/10 text-center text-xs text-slate-500 py-5">© {{ date('Y') }} {{ config('business.name') }}. Hak cipta dilindungi.</div>
</footer>
</body>
</html>
