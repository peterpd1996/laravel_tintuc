<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
    }


}
class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Tung duong','email'=> 'abc@gmail.com','password' => bcrypt('123')],
            ['name' => 'Van duong','email'=> 'zxc@gmail.com','password' => bcrypt('123')]
            
        ]);
    }
}
