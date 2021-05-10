<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employee = [
            'first_name' => 'employee',
            'last_name'  => 'employee',
            'father_name'=> 'employee',
            'gender'     => 'male',
            'blood_group'=> 'A+',
            'password'   => '1234',

        ];
        DB::table('employees')->insert($employee);
    }
}
