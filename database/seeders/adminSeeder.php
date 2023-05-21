<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new User();
        $admin->name="Kamran Ali";
        $admin->email="admin@gmail.com";
        $admin->password=Hash::make("admin");
        $admin->phone="928277273";
        $admin->role="admin";
        $admin->country_id=1;
        $admin->state_id=1;
        $admin->city_id=1;
        $admin->save();
    }
        
}
