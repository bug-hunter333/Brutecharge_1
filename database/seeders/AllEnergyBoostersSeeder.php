<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllEnergyBoostersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('all_energy_boosters')->insert([
            [
                'name' => 'POWER CREATINE SUPREME',
                'description' => 'The ultimate strength amplifier engineered for maximum power output. Pure micronized creatine monohydrate delivers explosive strength gains, enhanced muscle power, and lightning-fast recovery for unstoppable performance.',
                'price' => 24.99,
                'image_url' => 'https://shop.biotechusa.com/cdn/shop/products/100CreatineMonohydrate_Unflav_500g_1l.png?v=1623392653',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BRUTAL IGNITION',
                'description' => 'The ultimate pre-workout formula engineered for athletes who demand maximum performance. Experience explosive energy, razor-sharp focus, and skin-splitting pumps that last your entire workout.',
                'price' => 49.99,
                'image_url' => 'https://ca.tc-nutrition.com/cdn/shop/files/1188EB7D-6A3D-4426-AC42-E49702C08F6C_1024x1024.png?v=1746540678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MASS DESTROYER',
                'description' => 'The ultimate muscle-building protein engineered for serious athletes. Pure whey isolate delivers 30g of premium protein per serving with lightning-fast absorption for maximum anabolic response and explosive muscle growth.',
                'price' => 39.99,
                'image_url' => 'https://shop.biotechusa.com/cdn/shop/files/izek_packshot_HQ2024_100PW_1000x1000_coconut_choco_c_1.png?v=1740072447',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
