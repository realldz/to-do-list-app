<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create([
        //     'username' => 'admin',
        //     'password' => bcrypt('admin'),
        //     'is_admin' => 1
        // ]);
        $admin = new \App\Models\User;
        $admin->username = 'admin';
        $admin->password = bcrypt('admin');
        $admin->is_admin = 1;
        $admin->save();

    }
}
