<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDetail::insert([
            [
                'user_id' => 2,
                'gender' => 'Laki-laki',
                'address' => 'Malang',
                'phone_number' => '08123456789',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
