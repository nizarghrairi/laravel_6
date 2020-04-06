<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('password')
        ]);

        $auteur = User::create([
            'name'=>'auteur',
            'email'=>'auteur@auteur.com',
            'password'=> Hash::make('password')
        ]);

        $utilisteur = User::create([
            'name'=>'utilisateur',
            'email'=>'utilisateur@utilisateur.com',
            'password'=> Hash::make('password')
        ]);

        $adminRole      = Role::where('name','admin')->first();
        $auteurRole     = Role::where('name','auteur')->first();
        $utilisteurRole = Role::where('name','utilisteur')->first();


        $admin->roles()->attach($adminRole);
        $auteur->roles()->attach($auteurRole);
        $utilisteur->roles()->attach($utilisteurRole);


    }
}
