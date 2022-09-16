<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_1=Role::create([
            'name'=>'admin',
        ]);
        $role_2=Role::create([
            'name'=>'user',
        ]);
    }
}
