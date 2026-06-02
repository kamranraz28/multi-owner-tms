<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TenantServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('tenantservices')->insert([
            [
                'id' => 2,
                'tenant_id' => 2,
                'service_id' => 2,
<<<<<<< HEAD
                'value' => 1000,
                'status' => 1,
                'start_date' => null,
                'end_date' => null,
                'created_at' => '2025-05-25 04:01:11',
                'updated_at' => '2025-05-25 04:01:11',
=======
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 1000,
                'created_at' => '2025-05-24 22:01:11',
                'updated_at' => '2025-05-24 22:01:11',
>>>>>>> c57bb21 (subscription module)
            ],
            [
                'id' => 3,
                'tenant_id' => 2,
                'service_id' => 3,
<<<<<<< HEAD
                'value' => 20000,
                'status' => 1,
                'start_date' => null,
                'end_date' => null,
                'created_at' => '2025-05-25 04:05:41',
                'updated_at' => '2025-05-25 04:05:41',
=======
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 20000,
                'created_at' => '2025-05-24 22:05:41',
                'updated_at' => '2025-05-24 22:05:41',
>>>>>>> c57bb21 (subscription module)
            ],
            [
                'id' => 4,
                'tenant_id' => 2,
                'service_id' => 4,
<<<<<<< HEAD
                'value' => 500,
                'status' => 1,
                'start_date' => null,
                'end_date' => null,
                'created_at' => '2025-05-25 04:06:29',
                'updated_at' => '2025-05-25 04:06:29',
=======
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 500,
                'created_at' => '2025-05-24 22:06:29',
                'updated_at' => '2025-05-24 22:06:29',
            ],
            [
                'id' => 5,
                'tenant_id' => 6,
                'service_id' => 3,
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 2000,
                'created_at' => '2026-05-12 03:40:19',
                'updated_at' => '2026-05-12 03:40:19',
            ],
            [
                'id' => 7,
                'tenant_id' => 6,
                'service_id' => 2,
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 5000,
                'created_at' => '2026-05-12 03:45:13',
                'updated_at' => '2026-05-12 03:45:13',
            ],
            [
                'id' => 8,
                'tenant_id' => 11,
                'service_id' => 3,
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 3000,
                'created_at' => '2026-05-12 04:23:13',
                'updated_at' => '2026-05-12 04:23:13',
            ],
            [
                'id' => 9,
                'tenant_id' => 10,
                'service_id' => 3,
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 3000,
                'created_at' => '2026-05-12 04:24:16',
                'updated_at' => '2026-05-12 04:24:16',
            ],
            [
                'id' => 10,
                'tenant_id' => 12,
                'service_id' => 20,
                'start_date' => null,
                'end_date' => null,
                'status' => 1,
                'value' => 2500,
                'created_at' => '2026-05-13 23:08:06',
                'updated_at' => '2026-05-13 23:08:06',
>>>>>>> c57bb21 (subscription module)
            ],
        ]);
    }
}
