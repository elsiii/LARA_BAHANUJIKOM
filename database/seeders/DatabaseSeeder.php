<?php
namespace Database\Seeders;
use App\Models\User;

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
        // \App\Models\User::factory(5)->create();
        User::create([
            'name' => '1111',
            'isrole' => '1',
            'email' =>'1111@gmail.com',
            'password' => bcrypt('password'),
            'namerole' => 'administrator',

        ]);
    }
}
