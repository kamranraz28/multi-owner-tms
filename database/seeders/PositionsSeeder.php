<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
<<<<<<< HEAD
                'id' => 2,
                'name' => 'North-3/A',
                'status' => 1,
                'created_at' => '2025-05-25 02:08:43',
                'updated_at' => '2025-05-25 02:08:43',
=======
                'id' => 1,
                'name' => 'South-3/B',
                'organization_id' => 16,
                'status' => 1,
                'created_at' => '2026-05-12 00:37:08',
                'updated_at' => '2026-05-12 00:38:46',
            ],
            [
                'id' => 2,
                'name' => 'North-3/B',
                'organization_id' => 16,
                'status' => 1,
                'created_at' => '2026-05-12 00:40:37',
                'updated_at' => '2026-05-12 00:40:37',
            ],
            [
                'id' => 3,
                'name' => 'North-3/A',
                'organization_id' => 15,
                'status' => 1,
                'created_at' => '2026-05-12 00:42:57',
                'updated_at' => '2026-05-12 00:52:50',
            ],
            [
                'id' => 4,
                'name' => 'South Position',
                'organization_id' => 17,
                'status' => 1,
                'created_at' => '2026-05-13 22:59:45',
                'updated_at' => '2026-05-13 22:59:45',
>>>>>>> c57bb21 (subscription module)
            ],
        ]);
    }
}
