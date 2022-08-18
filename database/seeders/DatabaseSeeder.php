<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      $thai = $this->setPasswordAttribute(23);
       DB::table('users')->insert([
        'username' => 'thai23',
        'password' => bcrypt('23'),
    'email' => 'tranthai22756@gmail.com',
        'role' => 1,
        
       ]);
    }
}
