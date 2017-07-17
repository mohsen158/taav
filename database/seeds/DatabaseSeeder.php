<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        factory(\App\User::class,1)->create();
        factory(\App\Step::class,5)->create();
//        factory(\App\Member::class,50)->create()->each(function ($m)
//        {
//
//            $m->steps()->attach(\App\Step::first());
//        });

    }
}
