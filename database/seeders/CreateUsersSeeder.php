<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert([
            [ 'firstName' =>'Admin',
              'lastName'=>'Admin',
              'username'=>'Admin1',
              'email' =>'admin@homehelp.org',
              'password' =>bcrypt('admin'),
              'type'=>'admin',
        ],
            [ 
                   'firstName' =>'candidat',
                   'lastName'=>'candidat',
                   'username'=>'candidat1',
                   'email'=>'candidat@gmail.com',
                   'type'=>'candidat',
                   'password'=>bcrypt('candidat')
                ],
               [
                            'firstName' =>'famille',
                            'lastName'=>'famille',
                            'username'=>'famille1',
                            'email'=>'famille@gmail.com',
                            'type'=>'famille',
                            'password'=>bcrypt('famille'),
                        ],

        ]);





    }
}
