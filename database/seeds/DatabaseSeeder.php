<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'name' => 'Nguyễn Duy Tùng',
            'email' => 'icrhm9x@gmail.com',
            'password' => bcrypt('123123'),
            'avatar' => 'abc xyz',
            'ruler' => '1',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
