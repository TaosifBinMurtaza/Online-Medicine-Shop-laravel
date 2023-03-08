<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 20; $x++) {
            DB::table('customers')->insert([
                'customer_name' => Str::random(10),
                'customer_email' => Str::random(5).'@gmail.com',
                'customer_mob' =>'0100000'.$x,
                'customer_add' => Str::random(10),   
                'password' => Hash::make('password'),
            ]);
          }  
    }
}