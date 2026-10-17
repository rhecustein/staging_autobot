@extends('layouts.app')
@section('title', 'Kontak')
@section('content')
<div class="max-w-3xl mx-auto px-4 pt-12">
    <h1 class="text-3xl font-bold">Hubungi Kami</h1>
    <p class="text-slate-600 mt-2">Ada pertanyaan tentang pesanan, produk, atau langganan? Tim {{ config('business.name') }} siap membantu.</p>
    <div class="grid md:grid-cols-2 gap-4 mt-8">
        <div class="bg-white border rounded-xl p-5"><div class="text-2xl">📍</div><div class="font-semibold mt-1">Alamat</div><div class="text-sm text-slate-600">{{ config('business.address') }}</div></div>
        <div class="bg-white border rounded-xl p-5"><div class="text-2xl">✉️</div><div class="font-semibold mt-1">Email</div><a class="text-sm text-indigo-600" href="mailto:{{ config('business.email') }}">{{ config('business.email') }}</a></div>
        <div class="bg-white border rounded-xl p-5"><div class="text-2xl">📞</div><div class="font-semibold mt-1">Telepon / WhatsApp</div><div class="text-sm text-slate-600">{{ config('business.phone') }}</div></div>
        <div class="bg-white border rounded-xl p-5"><div class="text-2xl">🕘</div><div class="font-semibold mt-1">Jam Operasional</div><div class="text-sm text-slate-600">Senin–Jumat, 09.00–17.00 WIB</div></div>
    </div>
</div>
@endsection
