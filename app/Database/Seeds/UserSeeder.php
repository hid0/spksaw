<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

        $user_object->insertBatch([
            [
                "name" => "Jamal Muhlis",
                "email" => "jamalmuhlis@gmail.com",
                "phone_no" => "082313709240",
                "role" => "admin",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
                "name" => "Muhammad Fajar Dwi Guntoro",
                "email" => "2980@smkw9jepara.sch.id",
                "phone_no" => "808080808080",
                "role" => "siswa",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
                "name" => "Adi Kurniawan",
                "email" => "adi_k@smkw9jepara.sch.id",
                "phone_no" => "909090909090",
                "role" => "koordinator",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
                "name" => "Dian Fahlevi",
                "email" => "levi@smkw9jepara.sch.id",
                "phone_no" => "707070707070",
                "role" => "hubin",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
                "name" => "Ina Itaqi Zuliana",
                "email" => "ina@smkw9jepara.sch.id",
                "phone_no" => "606060606060",
                "role" => "gurubk",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
                "name" => "Irbab Aulia Amri",
                "email" => "irbab@smkw9jepara.sch.id",
                "phone_no" => "505050505050",
                "role" => "kepsek",
                "password" => password_hash("12345678", PASSWORD_DEFAULT)
            ]
        ]);
    }
}
