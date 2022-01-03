<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $userData = [
        //     [
        //         'name' => 'admin',
        //         'email' => 'admin@gmail.com',
        //         'password' => Hash::make('123456')
        //     ],
        //     [
        //         'name' => 'QuanKull',
        //         'email' => 'quannh.paraline@gmail.com',
        //         'password' => Hash::make('123456')
        //     ],
        // ];

        // foreach ($userData as $u) {
        //     $model = new User();
        //     $model->fill($u);
        //     $model->save();
        // }
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}