<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 10; $x++) {
            DB::table('orders')->insert([
                'c_id' => $x ,
                'd_id' => '1',
                'status' => 'Delivered',
                'created_at'=>'2022-06-17 11:09:10',
                'updated_at'=>'2022-06-17 11:09:10',
 
            ]);
          }  
    }
}