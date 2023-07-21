<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'name'=>'Name1',
            'address'=>'Nam Định',
            'email'=>'khnc23@gmail.com',
            'phone'=>'0343344075',
            'post_code'=>'ND1',
            'payment_method'=>'cod',
            'currency'=>'VND',
            'amount'=>'2',
            'order_no'=>'ok1',
            'invoice_no'=>'no1',
            'date'=>'2023/07/26',
            'status'=>'new',
            'transaction'=>'transaction1',
            'user_id'=>'1',
        ]);
        DB::table('orders')->insert([
            'name'=>'Name2',
            'address'=>'Nam Định2',
            'email'=>'ac120@gmail.com',
            'phone'=>'0383544075',
            'post_code'=>'ND2',
            'payment_method'=>'cod',
            'currency'=>'VND',
            'amount'=>'2',
            'order_no'=>'ok2',
            'invoice_no'=>'no2',
            'date'=>'2023/07/26',
            'status'=>'new',
            'transaction'=>'transaction2',
            'user_id'=>'2',
        ]);
        DB::table('orders')->insert([
            'name'=>'Name3',
            'address'=>'Nam Định3',
            'email'=>'bnc790@gmail.com',
            'phone'=>'0373345076',
            'post_code'=>'ND3',
            'payment_method'=>'cod',
            'currency'=>'VND',
            'amount'=>'2',
            'order_no'=>'ok3',
            'invoice_no'=>'no3',
            'date'=>'2023/07/26',
            'status'=>'new',
            'transaction'=>'transaction3',
            'user_id'=>'3',
        ]);
        DB::table('orders')->insert([
            'name'=>'Name4',
            'address'=>'Nam Định4',
            'email'=>'anltk27326@gmail.com',
            'phone'=>'0986744075',
            'post_code'=>'ND4',
            'payment_method'=>'cod',
            'currency'=>'VND',
            'amount'=>'2',
            'order_no'=>'ok4',
            'invoice_no'=>'no4',
            'date'=>'2023/07/26',
            'status'=>'new',
            'transaction'=>'transaction4',
            'user_id'=>'4',
        ]);
        DB::table('orders')->insert([
            'name'=>'Name5',
            'address'=>'Nam Định5',
            'email'=>'mnbv87@gmail.com',
            'phone'=>'0353344059',
            'post_code'=>'ND5',
            'payment_method'=>'cod',
            'currency'=>'VND',
            'amount'=>'2',
            'order_no'=>'ok5',
            'invoice_no'=>'no5',
            'date'=>'2023/07/26',
            'status'=>'new',
            'transaction'=>'transaction5',
            'user_id'=>'5',
        ]);
    }
}
