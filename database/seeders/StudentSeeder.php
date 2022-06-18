<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as fake;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = fake::create();

        for($i=1;$i<=10;$i++) {
            Student::create([
                'fname' => $info->firstName,
                'mname' => $info->randomElement(['Bantawa', 'Thulung', 'Bahing']),
                'lname' => $info->lastName,
                'email' => $info->unique()->safeEmail,
                'phone' => $info->unique()->phoneNumber,
                'gender' => $info->randomElement(['male','female','other']),
                'DOB' => $info->dateTimeThisMonth(),
                'grade' => $info->numberBetween(1,12),
                'studentid' => $info->unique()->randomNumber(8, true)
            ]);
        }
    }
}
