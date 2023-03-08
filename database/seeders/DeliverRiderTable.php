<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DeliverRiderTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 20; $x++) {
            DB::table('deliverymans')->insert([
                'delman_name' => Str::random(10),
                'delman_email' => Str::random(10).'@gmail.com',
                'delman_mob' => Str::random(10),
                'delman_dob' => Str::random(10),
                'delman_nid' => Str::random(10),
                'delman_add' => Str::random(10),
                'image' => "default.png",
    
                'password' => Hash::make('password'),
            ]);
          }         
    }
}