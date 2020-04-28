<?php

use Illuminate\Database\Seeder;

class ProgrammesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programmes')->insert([
            'name' => Str::random(10),
            'duration' => Str::random(10),
            'details' => Str::random(1000),
            'requirement' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(), 
        ]);
    }
}
