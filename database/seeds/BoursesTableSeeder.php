<?php

use Illuminate\Database\Seeder;

class BoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bourses')->insert([
            'name' => Str::random(10),
            'duree' => Str::random(10),
            'date_entree' => Str::random(10),
            'detail' => Str::random(100),
            'created_at' => now(),
            'updated_at' => now(), 
        ]);
    }
}
