<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'user'];
        $actions = ['view', 'create', 'edit', 'delete'];
        $models = ['users', 'clients', 'projects', 'tasks'];
        foreach ($roles as $role) {
            $roleModel = Role::create([
                'name' => $role,
            ]);
            foreach ($actions as $action) {
                foreach ($models as $model) {
                    if ($role == 'user' && $model == 'users') {
                        continue;
                    }
                    $roleModel->givePermissionTo($action . ' ' . $model);
                }
            }
        }
    }
}
