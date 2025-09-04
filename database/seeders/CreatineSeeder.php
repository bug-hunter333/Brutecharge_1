<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('creatines')->insert([
            [
                'name' => 'POWER CREATINE SUPREME',
                'description' => 'The ultimate strength amplifier engineered for maximum power output. Pure micronized creatine monohydrate delivers explosive strength gains, enhanced muscle power, and lightning-fast recovery for unstoppable performance.',
                'price' => 24.99,
                'image_url' => 'https://shop.biotechusa.com/cdn/shop/products/100CreatineMonohydrate_Unflav_500g_1l.png?v=1623392653',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}