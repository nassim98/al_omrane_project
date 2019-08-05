<?php

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
        DB::table('users')->insert([
            'name' => 'zakaria',
            'email' => 'zakaria@me.com',
            'password' => bcrypt('123456789'),
        ]);

        factory(App\Document::class, 10)->create();
    }
}
