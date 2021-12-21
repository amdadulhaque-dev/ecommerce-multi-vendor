<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */

    public function run() {
        DB::table('users')->insert([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin@gmail.com"),
            "role" => 2,
            "created_at" => Carbon::now(),
        ]);

    }


}
