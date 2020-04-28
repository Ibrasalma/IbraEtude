<?php

use Illuminate\Database\Seeder;

class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            'name' => Str::random(10),
            'ville' => Str::random(10),
            'province' => Str::random(10),
            'details' => Str::random(1000),
            'slogan' => Str::random(10),
            'code' => Str::random(10),
            'website' => Str::random(10),
            'wechat' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(), 
        ]);
    }
}
