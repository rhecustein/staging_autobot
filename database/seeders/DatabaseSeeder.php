<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'slug' => 'gantungan-akrilik-custom',
                'name' => 'Gantungan Kunci Akrilik Custom',
                'type' => 'physical',
                'price' => 25000,
                'emoji' => '🔑',
                'description' => 'Gantungan kunci akrilik bening dengan cetak desain atau nama sesuai pesanan. Ukuran 5 cm, tahan air, dan tidak mudah pudar.',
            ],
            [
                'slug' => 'gantungan-kulit',
                'name' => 'Gantungan Kunci Kulit',
                'type' => 'physical',
                'price' => 35000,
                'emoji' => '👜',
                'description' => 'Gantungan kunci berbahan kulit sintetis premium dengan emboss nama atau inisial. Awet dan nyaman digenggam.',
            ],
            [
                'slug' => 'gantungan-logo-autobot',
                'name' => 'Gantungan Kunci Logo Autobot',
                'type' => 'physical',
                'price' => 30000,
                'emoji' => '🤖',
                'description' => 'Gantungan kunci edisi Autobot dari bahan logam antikarat. Cocok untuk merchandise dan hadiah.',
            ],
            [
                'slug' => 'gantungan-mobil-wangi',
                'name' => 'Gantungan Pewangi Mobil',
                'type' => 'physical',
                'price' => 20000,
                'emoji' => '🚗',
                'description' => 'Gantungan pewangi mobil beraroma segar yang tahan hingga 30 hari, tersedia dalam desain Autobot.',
            ],
            [
                'slug' => 'stiker-pack',
                'name' => 'Stiker Pack Autobot (10 pcs)',
                'type' => 'physical',
                'price' => 15000,
                'emoji' => '⭐',
                'description' => 'Paket 10 stiker vinyl tahan air untuk laptop, helm, dan kendaraan.',
            ],
            [
                'slug' => 'lanyard-autobot',
                'name' => 'Lanyard Autobot',
                'type' => 'physical',
                'price' => 18000,
                'emoji' => '🎟️',
                'description' => 'Tali lanyard 2 cm dengan cetak logo Autobot, lengkap dengan pengait kartu identitas.',
            ],
            [
                'slug' => 'langganan-basic',
                'name' => 'Langganan Basic',
                'type' => 'subscription',
                'price' => 49000,
                'period' => 'bulan',
                'emoji' => '🌱',
                'description' => 'Cocok untuk penggunaan pribadi dan mencoba layanan Autobot.',
                'features' => ['1 akun pengguna', 'Hingga 3 bot aktif', 'Dukungan email', 'Laporan bulanan'],
            ],
            [
                'slug' => 'langganan-pro',
                'name' => 'Langganan Pro',
                'type' => 'subscription',
                'price' => 99000,
                'period' => 'bulan',
                'emoji' => '🚀',
                'description' => 'Untuk bisnis kecil yang membutuhkan otomasi lebih banyak.',
                'features' => ['3 akun pengguna', 'Hingga 15 bot aktif', 'Dukungan prioritas via WhatsApp', 'Laporan mingguan', 'Integrasi API'],
            ],
            [
                'slug' => 'langganan-business',
                'name' => 'Langganan Business',
                'type' => 'subscription',
                'price' => 249000,
                'period' => 'bulan',
                'emoji' => '🏢',
                'description' => 'Untuk tim dan perusahaan dengan kebutuhan skala besar.',
                'features' => ['Pengguna tanpa batas', 'Bot aktif tanpa batas', 'Account manager khusus', 'Laporan real-time', 'Integrasi API dan webhook', 'SLA 99,5%'],
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product,
            );
        }
    }
}
