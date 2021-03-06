<?php

namespace Database\Seeders;

use App\Models\Business;
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
        $this->call([
            AdminUserSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            BusinessSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
