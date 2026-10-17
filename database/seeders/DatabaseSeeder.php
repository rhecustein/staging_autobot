<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $physical = [
            ['gantungan-akrilik-custom', 'Gantungan Kunci Akrilik Custom', 25000, '🔑', 'Gantungan kunci akrilik bening dengan cetak desain/nama sesuai pesanan. Ukuran 5 cm, tahan air dan tidak mudah pudar.'],
            ['gantungan-kulit', 'Gantungan Kunci Kulit', 35000, '👜', 'Gantungan kunci berbahan kulit sintetis premium dengan emboss nama atau inisial. Awet dan nyaman digenggam.'],
            ['gantungan-logo-autobot', 'Gantungan Kunci Logo Autobot', 30000, '🤖', 'Gantungan kunci edisi resmi logo Autobot dari bahan logam anti karat. Cocok untuk merchandise dan hadiah.'],
            ['gantungan-mobil-wangi', 'Gantungan Pewangi Mobil', 20000, '🚗', 'Gantungan pewangi mobil aroma segar tahan hingga 30 hari, tersedia dalam desain Autobot.'],
            ['stiker-pack', 'Stiker Pack Autobot (10 pcs)', 15000, '⭐', 'Paket 10 stiker vinyl tahan air untuk laptop, helm, dan kendaraan.'],
            ['lanyard-autobot', 'Lanyard Autobot', 18000, '🎫', 'Tali lanyard 2 cm dengan cetak logo Autobot, lengkap dengan pengait ID card.'],
        ];
        foreach ($physical as [$slug, $name, $price, $emoji, $desc]) {
            Product::create(['slug' => $slug, 'name' => $name, 'type' => 'physical', 'price' => $price, 'emoji' => $emoji, 'description' => $desc]);
        }

        $plans = [
            ['langganan-basic', 'Basic', 49000, '🌱', 'Cocok untuk penggunaan pribadi dan mencoba layanan Autobot.', ['1 akun pengguna', 'Hingga 3 bot aktif', 'Dukungan email', 'Laporan bulanan']],
            ['langganan-pro', 'Pro', 99000, '🚀', 'Untuk bisnis kecil yang membutuhkan otomasi lebih banyak.', ['3 akun pengguna', 'Hingga 15 bot aktif', 'Dukungan prioritas via WhatsApp', 'Laporan mingguan', 'Integrasi API']],
            ['langganan-business', 'Business', 249000, '🏢', 'Untuk tim dan perusahaan dengan kebutuhan skala besar.', ['Pengguna tanpa batas', 'Bot aktif tanpa batas', 'Account manager khusus', 'Laporan real-time', 'Integrasi API & webhook', 'SLA 99,5%']],
        ];
        foreach ($plans as [$slug, $name, $price, $emoji, $desc, $features]) {
            Product::create(['slug' => $slug, 'name' => "Langganan $name", 'type' => 'subscription', 'price' => $price, 'period' => 'bulan', 'emoji' => $emoji, 'description' => $desc, 'features' => $features]);
        }
    }
}
