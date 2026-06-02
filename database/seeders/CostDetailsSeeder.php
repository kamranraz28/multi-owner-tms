<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('costdetails')->insert([
            [
<<<<<<< HEAD
                'id' => 1,
                'cost_id' => 2,
                'service_id' => 2,
                'amount' => 100,
                'memo_upload' => null,
                'created_at' => '2025-05-27 05:05:02',
                'updated_at' => '2025-05-27 05:05:02',
            ],
            [
                'id' => 2,
                'cost_id' => 2,
                'service_id' => 3,
                'amount' => 10000,
                'memo_upload' => null,
                'created_at' => '2025-05-27 05:05:02',
                'updated_at' => '2025-05-27 05:05:02',
            ],
            [
                'id' => 3,
                'cost_id' => 3,
                'service_id' => 2,
                'amount' => 100,
                'memo_upload' => '1748344115_68359d3353586.jfif',
                'created_at' => '2025-05-27 05:08:35',
                'updated_at' => '2025-05-27 05:08:35',
            ],
            [
                'id' => 4,
                'cost_id' => 3,
                'service_id' => 4,
                'amount' => 100,
                'memo_upload' => '1748344115_68359d3386b0c.PNG',
                'created_at' => '2025-05-27 05:08:35',
                'updated_at' => '2025-05-27 05:08:35',
            ],
            [
=======
>>>>>>> c57bb21 (subscription module)
                'id' => 5,
                'cost_id' => 4,
                'service_id' => 4,
                'amount' => 100,
                'memo_upload' => null,
<<<<<<< HEAD
                'created_at' => '2025-05-27 05:21:13',
                'updated_at' => '2025-05-27 05:21:13',
=======
                'created_at' => '2025-05-26 23:21:13',
                'updated_at' => '2025-05-26 23:21:13',
>>>>>>> c57bb21 (subscription module)
            ],
            [
                'id' => 6,
                'cost_id' => 4,
                'service_id' => 3,
                'amount' => 1000,
                'memo_upload' => null,
<<<<<<< HEAD
                'created_at' => '2025-05-27 05:21:13',
                'updated_at' => '2025-05-27 05:21:13',
=======
                'created_at' => '2025-05-26 23:21:13',
                'updated_at' => '2025-05-26 23:21:13',
>>>>>>> c57bb21 (subscription module)
            ],
            [
                'id' => 7,
                'cost_id' => 4,
                'service_id' => 2,
                'amount' => 300,
                'memo_upload' => null,
<<<<<<< HEAD
                'created_at' => '2025-05-27 05:21:13',
                'updated_at' => '2025-05-27 05:21:13',
            ],
            [
                'id' => 8,
                'cost_id' => 1,
                'service_id' => 2,
                'amount' => 1000,
                'memo_upload' => '1777892195_69f87b6304aba.pdf',
                'created_at' => '2026-05-04 04:56:35',
                'updated_at' => '2026-05-04 04:56:35',
            ],
            [
                'id' => 9,
                'cost_id' => 1,
                'service_id' => 2,
                'amount' => 100,
                'memo_upload' => '1777892195_69f87b63086b5.pdf',
                'created_at' => '2026-05-04 04:56:35',
                'updated_at' => '2026-05-04 04:56:35',
            ],
            [
                'id' => 10,
                'cost_id' => 2,
                'service_id' => 1,
                'amount' => 112,
                'memo_upload' => '1777893490_69f88072d1b68.pdf',
                'created_at' => '2026-05-04 05:18:10',
                'updated_at' => '2026-05-04 05:18:10',
            ],
            [
                'id' => 11,
                'cost_id' => 3,
                'service_id' => 1,
                'amount' => 21312,
                'memo_upload' => '1777893528_69f880989d8fb.pdf',
                'created_at' => '2026-05-04 05:18:48',
                'updated_at' => '2026-05-04 05:18:48',
=======
                'created_at' => '2025-05-26 23:21:13',
                'updated_at' => '2025-05-26 23:21:13',
            ],
            [
                'id' => 12,
                'cost_id' => 5,
                'service_id' => 3,
                'amount' => 1000,
                'memo_upload' => null,
                'created_at' => '2026-05-12 04:25:46',
                'updated_at' => '2026-05-12 04:25:46',
            ],
            [
                'id' => 13,
                'cost_id' => 4,
                'service_id' => 3,
                'amount' => 1,
                'memo_upload' => null,
                'created_at' => '2026-05-13 23:32:23',
                'updated_at' => '2026-05-13 23:32:23',
            ],
            [
                'id' => 14,
                'cost_id' => 5,
                'service_id' => 21,
                'amount' => 10000,
                'memo_upload' => null,
                'created_at' => '2026-05-13 23:37:09',
                'updated_at' => '2026-05-13 23:37:09',
            ],
            [
                'id' => 15,
                'cost_id' => 6,
                'service_id' => 8,
                'amount' => 2000,
                'memo_upload' => '1778741374_6a05707ec68b3.png',
                'created_at' => '2026-05-14 00:49:35',
                'updated_at' => '2026-05-14 00:49:35',
            ],
            [
                'id' => 16,
                'cost_id' => 7,
                'service_id' => 4,
                'amount' => 500,
                'memo_upload' => '1778741525_6a05711507b60.pdf',
                'created_at' => '2026-05-14 00:52:05',
                'updated_at' => '2026-05-14 00:52:05',
>>>>>>> c57bb21 (subscription module)
            ],
        ]);
    }
}
