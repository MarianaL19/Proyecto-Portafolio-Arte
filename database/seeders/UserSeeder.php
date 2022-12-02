<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creo el usuario administrador
        User::create([
            'name' => 'Mariana',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => 'mariana@test.com',
            'rol' => 'admin',
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\Commission::factory(5)->create();
        \App\Models\Product::factory(15)->create();

        //Poblar la tabla product_user
        foreach (range(1,10) as $index) {
            DB::table('product_user')->insert([
                'user_id' => User::inRandomOrder()->first()->id,
                'product_id' => Product::inRandomOrder()->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 
    }
}
