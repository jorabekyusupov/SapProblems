<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $pass = 'sardorbe8666';
        $pass = bcrypt($pass);

        DB::unprepared("insert into users (firstname,lastname,email,password, is_admin, employee) values ('Sardorbek', 'Yusupov','superadmin@gmail.com','$pass', 1, 1)");
    }
}
