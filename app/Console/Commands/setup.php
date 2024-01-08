<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Database\Factories\UserFactory;

class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user and assign the admin role';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = Role::firstOrCreate(['name' => 'admin']);

        $name = $this->ask('Enter the name of the admin user') ?? 'BigBoss';
        $email = $this->ask('Enter the email of the admin user') ?? 'mario@resl.info';
        $password = $this->secret('Enter the password for the admin user') ?? 'admin1234';

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        $user->assignRole($role);
        $this->info('Admin user created and role assigned successfully!');


        $userRole = Role::firstOrCreate(['name' => 'user']);
        User::factory()->count(10)->create()->each(function ($user) use ($userRole) {
            $user->assignRole($userRole);
        });
        $this->info('Ten dummy users created and assigned the user role!');
    }
}
