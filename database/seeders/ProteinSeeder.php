<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProteinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('proteins')->insert([
            [
                'name' => ' MASS DESTROYER',
                'description' => '  The ultimate muscle-building protein engineered for serious athletes. 
                                Pure whey isolate delivers 30g of premium protein per serving with lightning-fast absorption 
                                for maximum anabolic response and explosive muscle growth.',
                'price' =>39.99, 
                
                'image_url' => 'https://shop.biotechusa.com/cdn/shop/files/izek_packshot_HQ2024_100PW_1000x1000_coconut_choco_c_1.png?v=1740072447',
            ]
        ]);
    }
}
