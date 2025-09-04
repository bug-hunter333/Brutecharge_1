<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create 
                           {--name= : Admin name}
                           {--email= : Admin email}
                           {--password= : Admin password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🛡️  BruteCharge Admin Creator');
        $this->info('================================');

        // Get name
        $name = $this->option('name') ?: $this->ask('Admin name', 'BruteCharge Admin');

        // Get email
        $email = $this->option('email') ?: $this->ask('Admin email', 'admin@brutecharge.com');

        // Validate email
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email|unique:users,email'
        ]);

        if ($validator->fails()) {
            $this->error('Invalid email or email already exists!');
            return Command::FAILURE;
        }

        // Get password
        $password = $this->option('password') ?: $this->secret('Admin password (leave empty for default)');
        
        if (empty($password)) {
            $password = 'AdminBeast2025!';
            $this->info('Using default password: AdminBeast2025!');
        }

        // Create admin user
        try {
            $admin = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'is_admin' => true,
                'admin_since' => now(),
                'email_verified_at' => now(),
            ]);

            $this->info('');
            $this->info('✅ Admin user created successfully!');
            $this->info('📧 Email: ' . $email);
            $this->info('🔗 Login at: ' . url('/admin/login'));
            $this->info('');
            $this->warn('🔐 Make sure to change the default password after first login!');

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $this->error('Failed to create admin user: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}