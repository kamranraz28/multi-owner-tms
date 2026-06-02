<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('costs')->insert([
            [
<<<<<<< HEAD
                'id' => 2,
=======
                'id' => 1,
                'organization_id' => 16,
>>>>>>> c57bb21 (subscription module)
                'date' => '2025-05-01',
                'status' => 1,
                'created_at' => '2025-05-27 05:05:02',
                'updated_at' => '2025-05-27 05:05:02',
            ],
            [
<<<<<<< HEAD
                'id' => 3,
=======
                'id' => 2,
                'organization_id' => 15,
>>>>>>> c57bb21 (subscription module)
                'date' => '2025-05-02',
                'status' => 1,
                'created_at' => '2025-05-27 05:08:35',
                'updated_at' => '2025-05-27 05:08:35',
            ],
            [
<<<<<<< HEAD
                'id' => 4,
=======
                'id' => 3,
                'organization_id' => 16,
>>>>>>> c57bb21 (subscription module)
                'date' => '2025-05-03',
                'status' => 1,
                'created_at' => '2025-05-27 05:21:13',
                'updated_at' => '2025-05-27 05:21:13',
            ],
        ]);
    }
}
