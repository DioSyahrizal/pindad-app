<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                "name" => "Cahya Sabda Muhammad, ST.",
                "npp" => '801301',
                "jabatan" => "Management Trainee",
                'codename' => 'Cahya',
                "username" => "MUTU01",
                "password" => bcrypt("Mutu-MKK-01"),
            ],
            [
                'name' => 'Andiko Supranto, ST.',
                'codename' => 'Andiko',
                'npp' => '05259',
                'jabatan' => 'Senior Inspektur Mutu',
                'username' => 'MUTU03',
                'password' => bcrypt('Mutu-MKK-03'),
            ],
            [
                'name' => 'Moch. Aris Eko Pribadi',
                'codename' => 'Aris',
                'npp' => '05555',
                'jabatan' => 'Inspektur Mutu',
                'username' => 'MUTU05',
                'password' => bcrypt('Mutu-MKK-05'),
            ],
            [
                'name' => 'Winda Anjarwati, A.Md',
                'codename' => 'Winda',
                'npp' => '06274',
                'jabatan' => 'Inspektur Mutu',
                'username' => 'MUTU08',
                'password' => bcrypt('Mutu-MKK-08'),
            ],
            [
                'name' => 'Nanang Wahyuono',
                'codename' => 'Nanang',
                'npp' => '210389',
                'jabatan' => 'Junior Inspektur Mutu',
                'username' => 'MUTU09',
                'password' => bcrypt('Mutu-MKK-09'),
            ],
            [
                'name' => 'Sandika Beni Prasetyo',
                'codename' => 'Beni',
                'npp' => '06269',
                'jabatan' => 'Inspektur Mutu',
                'username' => 'MUTU10',
                'password' => bcrypt('Mutu-MKK-10'),
            ],
            [
                'name' => 'Rangga Swardana Qudsi',
                'codename' => 'Rangga',
                'npp' => '214384',
                'jabatan' => 'Junior Inspektur Mutu',
                'username' => 'MUTU15',
                'password' => bcrypt('Mutu-MKK-15'),
            ],
            [
                'name' => 'Dhiya Uddin Afif',
                'codename' => 'Uddin',
                'npp' => '05747',
                'jabatan' => 'Inspektur Mutu',
                'username' => 'MUTU16',
                'password' => bcrypt('Mutu-MKK-16'),
            ],
            [
                'name' => 'Agus Hariyanto, ST.',
                'codename' => 'Agus H.',
                'npp' => '02717',
                'jabatan' => 'Senior Inspektur Mutu',
                'username' => 'MUTU19',
                'password' => bcrypt('Mutu-MKK-19'),
            ],
            [
                'name' => 'Yuli Agus Rudianto, A.Md.',
                'codename' => 'Rudi Yuli',
                'npp' => '01273',
                'jabatan' => 'Expert Inspektur Mutu',
                'username' => 'MUTU20',
                'password' => bcrypt('Mutu-MKK-20'),
            ],
            [
                'name' => 'Bayu Wisnu Brata',
                'codename' => 'Bayu',
                'npp' => '05296',
                'jabatan' => 'Inspektur Mutu',
                'username' => 'MUTU21',
                'password' => bcrypt('Mutu-MKK-21'),
            ],
            [
                'name' => 'Wawan Eko Setyawanto',
                'codename' => 'Wawan',
                'npp' => '05291',
                'jabatan' => 'Inspektur Mutu',
                'username' => 'MUTU22',
                'password' => bcrypt('Mutu-MKK-22'),
            ],
            [
                'name' => 'Ahmad Fuad Zakky',
                'codename' => 'Zakky',
                'npp' => '214043',
                'jabatan' => 'Junior Inspektur Mutu',
                'username' => 'MUTU24',
                'password' => bcrypt('Mutu-MKK-24'),
            ],
            [
                'name' => 'Murdani',
                'codename' => 'Murdani',
                'npp' => '01816',
                'jabatan' => 'Senior Inspektur Mutu',
                'username' => 'MUTU25',
                'password' => bcrypt('Mutu-MKK-25'),
            ]
        ]);
    }
}
