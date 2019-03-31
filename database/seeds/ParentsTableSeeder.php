<?php

use Illuminate\Database\Seeder;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('parents')->insert([
            
            'name' => Str::random(3),
            'email' => Str::random(3).'@gmail.com',
            'password' => bcrypt('secret'),

        ]);
    }
}
