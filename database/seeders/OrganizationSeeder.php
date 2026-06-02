<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            [
                'id' => 11,
                'name' => 'Sagor Ahmed',
                'slug' => null,
                'user_id' => 1,
                'plan_id' => null,
                'phone' => '017817147981',
                'email' => 'sagorahmed@gmail.com',
                'password' => '$2y$10$e7K25.TMM5zzJnumLo0oYOy/0kshFj/ReLouU9EGlNprIhi.PwJu.',
                'address' => null,
                'logo' => null,
                'status' => 1,
                'role_id' => 4,
                'trial_ends_at' => null,
                'created_at' => Carbon::parse('2026-05-11 23:43:50'),
                'updated_at' => Carbon::parse('2026-05-11 23:43:50'),
            ],

            [
                'id' => 12,
                'name' => 'Billal',
                'slug' => null,
                'user_id' => 1,
                'plan_id' => null,
                'phone' => '01787147988',
                'email' => 'billal@gmail.com',
                'password' => '$2y$10$hxCNbMKuuNwJ/6b4PQlr3.yunbN5MMjr6vCVg5p0.shmWbKJSAzZm',
                'address' => null,
                'logo' => null,
                'status' => 1,
                'role_id' => 4,
                'trial_ends_at' => null,
                'created_at' => Carbon::parse('2026-05-12 00:06:23'),
                'updated_at' => Carbon::parse('2026-05-12 00:06:23'),
            ],

            [
                'id' => 13,
                'name' => 'Younus Shikh',
                'slug' => null,
                'user_id' => 1,
                'plan_id' => null,
                'phone' => '01971772772',
                'email' => 'younusshikh@gmail.com',
                'password' => '$2y$10$rhpBtlrwMGOO6mBikWx9ue1hgM1R0jUiqsao0d51ISOmhaXE.2PhW',
                'address' => null,
                'logo' => null,
                'status' => 1,
                'role_id' => 4,
                'trial_ends_at' => null,
                'created_at' => Carbon::parse('2026-05-12 00:11:41'),
                'updated_at' => Carbon::parse('2026-05-12 00:11:41'),
            ],

            [
                'id' => 14,
                'name' => 'Jabbir',
                'slug' => null,
                'user_id' => 1,
                'plan_id' => null,
                'phone' => '01787147933',
                'email' => 'Jabbir@gmail.com',
                'password' => '$2y$10$x7Y1VFBw.NspMd08mJQgcuOSH06UxMgXdo8kyirveFGKKuXhuhkLe',
                'address' => null,
                'logo' => null,
                'status' => 1,
                'role_id' => 4,
                'trial_ends_at' => null,
                'created_at' => Carbon::parse('2026-05-13 22:58:26'),
                'updated_at' => Carbon::parse('2026-05-13 22:58:26'),
            ],
        ]);
    }
}
