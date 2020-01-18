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
        factory(App\Service::class, 100)->create();
        factory(App\Diagnosis::class, 100)->create();
        factory(App\Patient::class, 100)->create();
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
