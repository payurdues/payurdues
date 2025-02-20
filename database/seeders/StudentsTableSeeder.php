<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert sample data into the students table
        DB::table('students')->insert([
            //HND 400
            [
                'matric_no' => null,
                'jamb_reg' => null,
                'form_no' => 'HND20241035',
                'first_name' => 'ABASS',
                'other_names' => 'sukurat oritoke',
                'faculty' => 'CMS',
                'department' => 'Buss admin',
                'level' => '400',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matric_no'=> null,
                'jamb_reg'=> null,
                'form_no' => 'HND20241235',
                'first_name' => 'ABIODUN',
                'other_names' => 'Elizabeth Bolalne',
                'faculty' => 'CMS',
                'department' => 'Buss admin',
                'level' => '400',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matric_no'=> null,
                'jamb_reg'=> null,
                'form_no' => 'HND20240415',
                'first_name' => 'LATEEF',
                'other_names' => 'Habeeb Sunday',
                'faculty' => 'CMS',
                'department' => 'Mass com',
                'level' => '400',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matric_no'=> null,
                'jamb_reg'=> null,
                'form_no' => 'HND20242649',
                'first_name' => 'ADEJUMO',
                'other_names' => 'Adeleye Olumide',
                'faculty' => 'CMS',
                'department' => 'Procurement',
                'level' => '400',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matric_no'=> null,
                'jamb_reg'=> null,
                'form_no' => 'HND20243589',
                'first_name' => 'ABIONA',
                'other_names' => 'AYOMIDE EMMANUEL',
                'faculty' => 'CMS',
                'department' => 'OTM',
                'level' => '400',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //nd 100

            [
                'matric_no'=> null,
                'jamb_reg' => '202440684880FA',
                'form_no' => 'ND20241371',
                'first_name' => 'ABDULAKEEM',
                'other_names' => 'Taiwo Azeezat',
                'faculty' => 'CMS',
                'department' => 'Mass com',
                'level' => '100',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'matric_no'=> null,
                'jamb_reg' => '202440010797FF',
                'form_no' => 'ND20243765',
                'first_name' => 'ABDULRASAQ',
                'other_names' => 'Bushroh Ayoka',
                'faculty' => 'CMS',
                'department' => 'Procurement',
                'level' => '100',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'matric_no'=> null,
                'jamb_reg' => '202441189925CA',
                'form_no' => 'ND20240751',
                'first_name' => 'AAYA',
                'other_names' => 'Mujeeb Adebowale',
                'faculty' => 'CMS',
                'department' => 'Pub Admin',
                'level' => '100',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'matric_no'=> null,
                'jamb_reg' => '202440014706IA',
                'form_no' => 'ND20240565',
                'first_name' => 'ABDULMALIK',
                'other_names' => 'Rodia Ajoke',
                'faculty' => 'CMS',
                'department' => 'Accountancy',
                'level' => '100',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'matric_no'=> null,
                'jamb_reg' => '202441020250EF',
                'form_no' => 'ND20241325',
                'first_name' => 'ABDULAKEEM',
                'other_names' => 'Fathiat Moromoke',
                'faculty' => 'CMS',
                'department' => 'Buss Admin',
                'level' => '100',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'matric_no'=> null,
                'jamb_reg' => '202440792841DF',
                'form_no' => 'ND20243418',
                'first_name' => 'ABDULKABIRU',
                'other_names' => 'Islamiat Alake',
                'faculty' => 'CMS',
                'department' => 'OTM',
                'level' => '100',
                'facultyduestatus' => 'pending',
                'depduestatus' => 'pending',
                'levelduestatus' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
