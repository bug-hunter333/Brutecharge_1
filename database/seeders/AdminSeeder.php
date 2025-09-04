<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the main admin user
        $admin = User::firstOrCreate([
            'email' => 'admin@brutecharge.com'
        ], [
            'name' => 'BruteCharge Admin',
            'password' => Hash::make('AdminBeast2025!'),
            'is_admin' => true,
            'admin_since' => now(),
            'email_verified_at' => now(),
        ]);

        if ($admin->wasRecentlyCreated) {
            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@brutecharge.com');
            $this->command->info('Password: AdminBeast2025!');
        } else {
            $this->command->info('Admin user already exists.');
        }

        // Create a few sample regular users for testing
        $sampleUsers = [
            [
                'name' => 'John Beast',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'beast_goals' => 'Muscle Domination',
                'workout_intensity' => 'BEAST',
            ],
            [
                'name' => 'Sarah Savage',
                'email' => 'sarah@example.com', 
                'password' => Hash::make('password123'),
                'beast_goals' => 'Fat Destruction',
                'workout_intensity' => 'SAVAGE',
            ],
            [
                'name' => 'Mike Legend',
                'email' => 'mike@example.com',
                'password' => Hash::make('password123'),
                'beast_goals' => 'Strength Maximization',
                'workout_intensity' => 'LEGEND',
            ]
        ];

        foreach ($sampleUsers as $userData) {
            User::firstOrCreate([
                'email' => $userData['email']
            ], array_merge($userData, [
                'email_verified_at' => now(),
            ]));
        }

        $this->command->info('Sample users created for testing.');
    }
}