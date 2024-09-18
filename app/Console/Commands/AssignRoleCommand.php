<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;

class AssignRoleCommand extends Command {
    protected $signature = 'assign:role {userId} {role}';

    protected $description = 'Assign a role to a user';

        public function handle(){
        $userId = $this->argument('userId');
        $roleName = $this->argument('role');

        $user = User::find($userId);
        $role = Role::where('name', $roleName)->first();

        if ($user && $role) {
        $user->roles()->attach($role);
        $this->info("Role '{$roleName}' has been assigned to user '{$user->name}'.");

            } else {

            $this->error('User or Role not found.');
            }
        }
}
