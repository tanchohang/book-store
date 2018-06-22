<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $jobs=['super','developer','cashier','shopkeeper'];

        foreach ($jobs as $job){

            DB::table('jobs')->insert([
                'title' => $job

        ]);

        }
    }
}
