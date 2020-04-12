<?php

use App\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 19)->create();
                
        $role = Role::create(['name' => 'Super Admin']);

        $user = User::create([
            'patient_id'     => 1,
            'cmp'            => '134148',
            'position'       => 'Analista Programador de Sistemas',
            'specialty'      => 'Desarrollador de Sistemas de Información',
            'email'          => 'yoeldiomedez@gmail.com',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole($role);
    }
}
