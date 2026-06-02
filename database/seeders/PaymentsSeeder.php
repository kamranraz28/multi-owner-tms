<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('payments')->insert([
            [
<<<<<<< HEAD
                'tenant_id' => 1,
                'payment_month' => 'January 2026',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tenant_id' => 2,
                'payment_month' => 'February 2026',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tenant_id' => 3,
                'payment_month' => 'March 2026',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tenant_id' => 1,
                'payment_month' => 'April 2026',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tenant_id' => 2,
                'payment_month' => 'May 2026',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
=======
                'id' => 1,
                'tenant_id' => 1,
                'payment_month' => 'January 2026',
                'created_at' => '2026-05-11 04:50:35',
                'updated_at' => '2026-05-11 04:50:35',
            ],
            [
                'id' => 2,
                'tenant_id' => 2,
                'payment_month' => 'February 2026',
                'created_at' => '2026-05-11 04:50:35',
                'updated_at' => '2026-05-11 04:50:35',
            ],
            [
                'id' => 3,
                'tenant_id' => 3,
                'payment_month' => 'March 2026',
                'created_at' => '2026-05-11 04:50:35',
                'updated_at' => '2026-05-11 04:50:35',
            ],
            [
                'id' => 4,
                'tenant_id' => 1,
                'payment_month' => 'April 2026',
                'created_at' => '2026-05-11 04:50:35',
                'updated_at' => '2026-05-11 04:50:35',
            ],
            [
                'id' => 5,
                'tenant_id' => 2,
                'payment_month' => 'May 2026',
                'created_at' => '2026-05-11 04:50:35',
                'updated_at' => '2026-05-11 04:50:35',
            ],
            [
                'id' => 6,
                'tenant_id' => 2,
                'payment_month' => '2026-05',
                'created_at' => '2026-05-12 04:43:41',
                'updated_at' => '2026-05-12 04:43:41',
            ],
            [
                'id' => 7,
                'tenant_id' => 3,
                'payment_month' => '2026-05',
                'created_at' => '2026-05-13 22:18:52',
                'updated_at' => '2026-05-13 22:18:52',
            ],
            [
                'id' => 8,
                'tenant_id' => 7,
                'payment_month' => '2026-05',
                'created_at' => '2026-05-13 22:18:57',
                'updated_at' => '2026-05-13 22:18:57',
            ],
            [
                'id' => 9,
                'tenant_id' => 10,
                'payment_month' => '2026-05',
                'created_at' => '2026-05-13 22:19:01',
                'updated_at' => '2026-05-13 22:19:01',
            ],
            [
                'id' => 10,
                'tenant_id' => 11,
                'payment_month' => '2026-05',
                'created_at' => '2026-05-13 22:49:40',
                'updated_at' => '2026-05-13 22:49:40',
            ],
            [
                'id' => 11,
                'tenant_id' => 12,
                'payment_month' => '2025-06',
                'created_at' => '2026-05-14 00:37:36',
                'updated_at' => '2026-05-14 00:37:36',
            ],
            [
                'id' => 12,
                'tenant_id' => 12,
                'payment_month' => '2026-05',
                'created_at' => '2026-05-14 02:28:12',
                'updated_at' => '2026-05-14 02:28:12',
>>>>>>> c57bb21 (subscription module)
            ],
        ]);
    }
}
