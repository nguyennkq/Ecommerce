<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            CouponSeeder::class,
            ProductSeeder::class,
            MultiImageSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            PermissionRoleSeeder::class,
            SettingSeeder::class,
            UserSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
