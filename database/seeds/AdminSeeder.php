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
            'admin_name' => 'Noori',
            'admin_pass' => 'Noori@Noori',
            'type' => 'super'
        ];
        DB::table('admins')->insert($admin);
    }
}
