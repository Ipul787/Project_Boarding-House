<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  User::create([
        'name'  => 'Satria Pangestu',
        'email' => 'owner@kostable.com',
        'role'  => 'Pemilik',
        'no_wa' => '089530375199',
        'foto' => '1681750777_satria.jpg',
        'password' => Hash::make(12345678),
        ]);

        $role = Role::create([
        'name'  => 'Pemilik'
        ]   );
        $user->assignRole($role);
        $user1 =  User::create([
            'name'  => 'Faizal Leviansyah',
            'email' => 'faisal@kostable.com',
            'role'  => 'Pemilik',
            'no_wa' => '089530322299',
            'foto' => 'levi.jpg',
            'password' => Hash::make('faisal123'),
        ]);
    

    $user1->assignRole($role);
    $user2 =  User::create([
        'name'  => 'Vinsensius Ade',
        'email' => 'Ade@kostable.com',
        'role'  => 'Pemilik',
        'no_wa' => '089530322256',
        'foto' => 'vinsen.jpg',
        'password' => Hash::make('vinsen123'),
    ]);



    $user2->assignRole($role);
    $user3 =  User::create([
        'name'  => 'Aminy Ghaisan ',
        'email' => 'aminy@kostable.com',
        'role'  => 'Pemilik',
        'no_wa' => '089510312489',
        'password' => Hash::make('aminy123'),
    ]);



    $user3->assignRole($role);
    $user4 =  User::create([
        'name'  => 'Saefullah Fatah ',
        'email' => 'iful@kostable.com',
        'role'  => 'Pemilik',
        'no_wa' => '089530321299',
        'password' => Hash::make('iful123'),
    ]);

 

    $user4->assignRole($role);

    $user5 =  User::create([
        'name'  => 'Faricha Aulia ',
        'email' => 'icha@kostable.com',
        'role'  => 'Pencari',
        'no_wa' => '089534252299',
        'password' => Hash::make('icha123'),
    ]);

    $role5 = Role::create([
        'name'  => 'Pencari'
    ]);

    $user5->assignRole($role5);
    

    }
}
