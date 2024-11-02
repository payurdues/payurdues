<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert sample records into the dues table
        DB::table('dues')->insert([

            [
                'name' => 'leavy  Fee',
                'amount' => 1000.00,
                'charges' => 5.00,
                'association_id' => 1, // Replace with a valid association ID
                'payable_faculties' => json_encode(['CMS']),
                'payable_departments' => json_encode(['MAC', 'PRO'.'BAM','ACC','PUB','OTM','MAR']),
                'payable_levels' => json_encode(['100', '400']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'Annual Membership Fee',
            //     'amount' => 100.00,
            //     'charges' => 5.00,
            //     'association_id' => 1, // Replace with a valid association ID
            //     'payable_faculties' => json_encode(['CMS']),
            //     'payable_departments' => json_encode(['MAC', 'PRO'.'BAM','ACC','PUB','OTM','MAR']),
            //     'payable_levels' => json_encode(['100', '400']),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Semester Exam Fee',
            //     'amount' => 50.00,
            //     'charges' => 2.50,
            //     'association_id' => 1, // Replace with a valid association ID
            //     'payable_faculties' => json_encode(['Science']),
            //     'payable_departments' => json_encode(['Biology']),
            //     'payable_levels' => json_encode(['100', '300']),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Graduation Fee',
            //     'amount' => 200.00,
            //     'charges' => 10.00,
            //     'association_id' => 2, // Replace with a valid association ID
            //     'payable_faculties' => json_encode(['All']),
            //     'payable_departments' => json_encode(['All']),
            //     'payable_levels' => json_encode(['Final Year']),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Late Registration Fee',
            //     'amount' => 25.00,
            //     'charges' => 3.00,
            //     'association_id' => 2, // Replace with a valid association ID
            //     'payable_faculties' => json_encode(['Arts']),
            //     'payable_departments' => json_encode(['Fine Arts']),
            //     'payable_levels' => json_encode(['200']),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Library Fee',
            //     'amount' => 15.00,
            //     'charges' => 1.50,
            //     'association_id' => 1, // Replace with a valid association ID
            //     'payable_faculties' => json_encode(['Engineering', 'Science']),
            //     'payable_departments' => json_encode(['Mechanical Engineering', 'Physics']),
            //     'payable_levels' => json_encode(['100', '200']),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
