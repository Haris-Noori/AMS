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
        $employees = [
            [
                'first_name' => 'Employee',
                'last_name'  => 'Employee',
                'father_name'=> 'employee',
                'gender'     => 'male',
                'blood_group'=> 'A+',
                'email'      => 'employee@employee.com',
                'password'   => '1234',
            ],
            [
                'first_name' => 'Hafeez Ahmad',
                'last_name'  => 'Noori',
                'father_name'=> 'Abdul Haq Noori',
                'gender'     => 'female',
                'blood_group'=> 'A+',
                'email'      => 'hafeez@email.com',
                'password'   => '1234',
            ],
            [
                'first_name' => 'Muhammad',
                'last_name'  => 'Irfan',
                'father_name'=> 'Khadim Husain',
                'gender'     => 'male',
                'blood_group'=> 'B+',
                'email'      => 'irfan@email.com',
                'password'   => '1234',
            ],
            [
                'first_name' => 'Khalida',
                'last_name'  => 'Perveen',
                'father_name'=> 'Shokat Ali',
                'gender'     => 'female',
                'blood_group'=> 'B+',
                'email'      => 'khalidaperveen360@gmail.com',
                'password'   => '1234',
            ],
            [
                'first_name' => 'Ikhlaq Ahmad',
                'last_name'  => 'Noori',
                'father_name'=> 'Hafiz Noor Nabi',
                'gender'     => 'male',
                'blood_group'=> 'B+',
                'email'      => 'ikhlaqahmad1124@gmail.com',
                'password'   => '1234',
            ]
            
        ];
        foreach($employees as $employee)
        {
            DB::table('employees')->insert($employee);
        }
    }
}
