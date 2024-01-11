<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateUserAndRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin and user role';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $this->info('Roles created');
    }
}
