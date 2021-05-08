<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'admin_name' => 'admin',
            'admin_pass' => 'admin',
            'type' => 'admin'
        ];
        DB::table('admins')->insert($admin);
    }
}
