<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Hash;

class createUser extends Command
{
    protected $signature = 'create:user';

    protected $description = 'Create a new user or admin';

    public function handle()
    {
        $role = $this->choice('Welche Rolle soll der Benutzer haben?', ['admin', 'user'], 1);
        $name = $this->ask('Name des Benutzers');
        $email = $this->ask('E-Mail des Benutzers');
        $password = $this->secret('Passwort des Benutzers');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if ($role === 'admin') {
            $user->assignRole('admin');
        } else {
            $user->assignRole('user');
        }

        $this->info('Benutzer erstellt mit der Rolle: ' . $role);
    }
}
