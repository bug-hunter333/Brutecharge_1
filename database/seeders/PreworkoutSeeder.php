<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PreworkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('preworkouts')->insert([
            [
                'name' => '  BRUTAL IGNITION',
                'description' => ' The ultimate pre-workout formula engineered for athletes who demand maximum performance. 
                                Experience explosive energy, razor-sharp focus, and skin-splitting pumps that last your entire workout.',
                'price' => 49.99, 
                
                'image_url' => 'https://ca.tc-nutrition.com/cdn/shop/files/1188EB7D-6A3D-4426-AC42-E49702C08F6C_1024x1024.png?v=1746540678',
            ]
        ]);
    }
}