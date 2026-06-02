<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
<<<<<<< HEAD
            'id' => 1,
            'name' => 'Kamran Khan',
            'email' => 'mdkamranhosan98@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
=======
            [
                'id' => 1,
                'name' => 'Kamran Khan',
                'email' => 'mdkamranhosan98@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$RqzKCAU8EjQga7XcATE4ZeLFr8Gv2Yc/650JTMDLh1GycxNb9mC6y',
                'organization_id' => null,
                'remember_token' => null,
                'created_at' => '2026-05-11 04:50:34',
                'updated_at' => '2026-05-11 04:50:34',
            ],
            [
                'id' => 15,
                'name' => 'Billal',
                'email' => 'billal@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$hxCNbMKuuNwJ/6b4PQlr3.yunbN5MMjr6vCVg5p0.shmWbKJSAzZm',
                'organization_id' => 12,
                'remember_token' => null,
                'created_at' => '2026-05-12 00:06:23',
                'updated_at' => '2026-05-12 00:06:23',
            ],
            [
                'id' => 16,
                'name' => 'Younus Shikh',
                'email' => 'younusshikh@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$rhpBtlrwMGOO6mBikWx9ue1hgM1R0jUiqsao0d51ISOmhaXE.2PhW',
                'organization_id' => 13,
                'remember_token' => null,
                'created_at' => '2026-05-12 00:11:41',
                'updated_at' => '2026-05-12 00:11:41',
            ],
            [
                'id' => 17,
                'name' => 'Jabbir',
                'email' => 'Jabbir@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$x7Y1VFBw.NspMd08mJQgcuOSH06UxMgXdo8kyirveFGKKuXhuhkLe',
                'organization_id' => 14,
                'remember_token' => null,
                'created_at' => '2026-05-13 22:58:26',
                'updated_at' => '2026-05-13 22:58:26',
            ],
>>>>>>> c57bb21 (subscription module)
        ]);
    }
}
