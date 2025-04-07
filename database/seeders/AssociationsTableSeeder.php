<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AssociationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('associations')->insert([
            [
                'name' => 'FACMAS DUE',
                'link' => 'https://companya.com',
                'email' => 'contact@companya.com',
                'about' => 'Company A is a leading provider of tech solutions.',
                'password' => bcrypt('password123'), // Hash the password
                'contact_person_name' => 'John Doe',
                'contact_person_phone' => '1234567890',
                'bank_code' => 'ABC123',
                'bank_name' => 'Bank of America',
                'bank_account_no' => '1234567890',
                'bank_account_name' => 'Company A Account',
                'provider' => 'Provider A',
                'image' => null, // Assuming no image for this entry
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FACMAS lEAVY',
                'link' => null,
                'email' => 'contact@companyb.com',
                'about' => 'Company B specializes in financial services.',
                'password' => bcrypt('password123'), // Hash the password
                'contact_person_name' => 'Jane Smith',
                'contact_person_phone' => '0987654321',
                'bank_code' => 'DEF456',
                'bank_name' => 'Chase Bank',
                'bank_account_no' => '0987654321',
                'bank_account_name' => 'Company B Account',
                'provider' => 'Provider B',
                'image' => 'company_b_logo.png', // Example image file
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company C',
                'link' => 'https://companyc.com',
                'email' => null,
                'about' => 'Company C is a startup focused on renewable energy.',
                'password' => bcrypt('password123'), // Hash the password
                'contact_person_name' => 'Alice Johnson',
                'contact_person_phone' => '1122334455',
                'bank_code' => 'GHI789',
                'bank_name' => 'Wells Fargo',
                'bank_account_no' => '1122334455',
                'bank_account_name' => 'Company C Account',
                'provider' => 'Provider C',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company D',
                'link' => 'https://companyd.com',
                'email' => 'info@companyd.com',
                'about' => null,
                'password' => bcrypt('password123'), // Hash the password
                'contact_person_name' => 'Michael Brown',
                'contact_person_phone' => '2233445566',
                'bank_code' => 'JKL012',
                'bank_name' => 'Bank of New York',
                'bank_account_no' => '2233445566',
                'bank_account_name' => 'Company D Account',
                'provider' => 'Provider D',
                'image' => 'company_d_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company E',
                'link' => 'https://companye.com',
                'email' => 'support@companye.com',
                'about' => 'Company E offers consultancy services.',
                'password' => bcrypt('password123'), // Hash the password
                'contact_person_name' => 'Chris Lee',
                'contact_person_phone' => '3344556677',
                'bank_code' => 'MNO345',
                'bank_name' => 'Citibank',
                'bank_account_no' => '3344556677',
                'bank_account_name' => 'Company E Account',
                'provider' => 'Provider E',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}