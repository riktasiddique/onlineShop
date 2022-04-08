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
        $roles = [
            [
                'name' => 'Super Admin',
                'created_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Admin',
                'created_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Customer',
                'created_at' => now()->toDateTimeString()
            ]
        ];
        Role::insert($roles);
    }
}
