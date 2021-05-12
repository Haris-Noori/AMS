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
        $admins = [
            [
                'admin_name' => 'admin',
                'admin_pass' => 'admin',
                'type' => 'super'
            ],
            [
                'admin_name' => 'Haris',
                'admin_pass' => 'haris',
                'type' => 'super'
            ],
            [
                'admin_name' => 'Shakeel',
                'admin_pass' => 'shakeel',
                'type' => 'super'
            ],
            [
                'admin_name' => 'Mubeen',
                'admin_pass' => 'mubeen',
                'type' => 'super'
            ]
            
        ];
        foreach($admins as $admin)
        {
            DB::table('admins')->insert($admin);
        }
    }
}
