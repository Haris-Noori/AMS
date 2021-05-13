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
            'first_name' => 'Employee',
            'last_name'  => 'Employee',
            'father_name'=> 'employee',
            'gender'     => 'male',
            'blood_group'=> 'A+',
            'password'   => '1234',

        ];
        DB::table('employees')->insert($employee);
    }
}
