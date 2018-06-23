<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new Admin();
        $admin->name="admin";
        $admin->email="admin@admin.com";
        $admin->password=bcrypt('password');
        $admin->save();
        $admin->jobs()->attach(1);


    }
}
