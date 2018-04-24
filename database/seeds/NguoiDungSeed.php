<?php

use Illuminate\Database\Seeder;

class NguoiDungSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tbl_nguoidung')->insert([
            'username'          => 'test',
            'password'          => '123456',
            'nhom_id'           => 1,
            'thongtinlienhe_id' => 1,
            'created_at'        => \Carbon\Carbon::now(),
            'updated_at'        => \Carbon\Carbon::now()
        ]);
    }
}
