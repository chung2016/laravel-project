<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = ['view', 'create', 'edit', 'delete'];
        $models = ['users', 'clients', 'projects', 'tasks'];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                Permission::create([
                    'name' => $action . ' ' . $model,
                ]);
            }
        }
    }
}
