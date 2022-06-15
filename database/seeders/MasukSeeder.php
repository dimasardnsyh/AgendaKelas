<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;



class MasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'ini akun admin',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => bcrypt('admin123'),
            ],
            [
                'nama' => 'ini akun guru',
                'email' => 'guru@gmail.com',
                'level' => 'guru',
                'password' => bcrypt('guru123'),
            ],
        ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
