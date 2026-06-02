<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
<<<<<<< HEAD
                'id'             => 2,
                'name'           => 'Electricity Bill',
                'description'    => 'Monthly electricity bill associated with tenant rent',
                'status'         => 1,
                'created_at'     => '2025-05-25 01:55:20',
                'updated_at'     => '2025-05-25 01:55:24',
            ],
            [
                'id'             => 3,
                'name'           => 'Rent',
                'description'    => 'Monthly rental charge for tenant accommodation',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:27',
                'updated_at'     => '2025-05-25 04:05:27',
            ],
            [
                'id'             => 4,
                'name'           => 'Parking',
                'description'    => 'Monthly parking space charge for vehicles',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:54',
                'updated_at'     => '2025-05-25 04:06:09',
            ],
            [
                'id'             => 5,
                'name'           => 'Water Bill',
                'description'    => 'Monthly water usage charge for tenant',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:54',
                'updated_at'     => '2025-05-25 04:06:09',
            ],
            [
                'id'             => 6,
                'name'           => 'Water Bill',
                'description'    => 'Monthly water usage charge for tenant',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:54',
                'updated_at'     => '2025-05-25 04:06:09',
            ],
            [
                'id'             => 7,
                'name'           => 'Internet Service',
                'description'    => 'Monthly internet connection fee for tenant use',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:54',
                'updated_at'     => '2025-05-25 04:06:09',
            ],
            [
                'id'             => 8,
                'name'           => 'Maintenance Fee',
                'description'    => 'Building maintenance and repair service charge',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:54',
                'updated_at'     => '2025-05-25 04:06:09',
            ],
            [
                'id'             => 9,
                'name'           => 'Security Fee',
                'description'    => 'Security service charge for tenant safety',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:54',
                'updated_at'     => '2025-05-25 04:06:09',
            ],
            [
                'id'             => 10,
                'name'           => 'Cleaning Service',
                'description'    => 'Common area cleaning and sanitation charge',
                'status'         => 1,
                'created_at'     => '2025-05-25 04:05:54',
                'updated_at'     => '2025-05-25 04:06:09',
            ],

=======
                'id' => 2,
                'name' => 'Electricity Bill',
                'organization_id' => 16,
                'description' => 'Monthly electricity bill associated with tenant rent',
                'status' => 1,
                'created_at' => '2025-05-24 19:55:20',
                'updated_at' => '2026-05-12 00:33:18',
            ],
            [
                'id' => 3,
                'name' => 'Rent',
                'organization_id' => 15,
                'description' => 'Monthly rental charge for tenant accommodation',
                'status' => 1,
                'created_at' => '2025-05-24 22:05:27',
                'updated_at' => '2026-05-12 10:22:58',
            ],
            [
                'id' => 4,
                'name' => 'Parking',
                'organization_id' => 16,
                'description' => 'Monthly parking space charge for vehicles',
                'status' => 1,
                'created_at' => '2025-05-24 22:05:54',
                'updated_at' => '2026-05-12 10:22:29',
            ],
            [
                'id' => 5,
                'name' => 'Water Bill',
                'organization_id' => 15,
                'description' => 'Monthly water usage charge for tenant',
                'status' => 1,
                'created_at' => '2025-05-24 22:05:54',
                'updated_at' => '2026-05-12 06:35:38',
            ],
            [
                'id' => 6,
                'name' => 'Water Bill',
                'organization_id' => 15,
                'description' => 'Monthly water usage charge for tenant',
                'status' => 1,
                'created_at' => '2025-05-24 22:05:54',
                'updated_at' => '2026-05-12 06:35:41',
            ],
            [
                'id' => 7,
                'name' => 'Internet Service',
                'organization_id' => 16,
                'description' => 'Monthly internet connection fee for tenant use',
                'status' => 1,
                'created_at' => '2025-05-24 22:05:54',
                'updated_at' => '2026-05-12 06:35:44',
            ],
            [
                'id' => 8,
                'name' => 'Maintenance Fee',
                'organization_id' => 16,
                'description' => 'Building maintenance and repair service charge',
                'status' => 1,
                'created_at' => '2025-05-24 22:05:54',
                'updated_at' => '2026-05-12 06:35:47',
            ],
            [
                'id' => 10,
                'name' => 'Cleaning Service',
                'organization_id' => 16,
                'description' => 'Common area cleaning and sanitation charge',
                'status' => 1,
                'created_at' => '2025-05-24 22:05:54',
                'updated_at' => '2026-05-12 06:35:49',
            ],
            [
                'id' => 18,
                'name' => 'Car Wash',
                'organization_id' => 15,
                'description' => 'Common area cleaning and sanitation charge',
                'status' => 1,
                'created_at' => '2026-05-12 00:30:28',
                'updated_at' => '2026-05-12 00:30:28',
            ],
            [
                'id' => 19,
                'name' => 'Security Fee',
                'organization_id' => 15,
                'description' => 'Security service charge for tenant safety',
                'status' => 1,
                'created_at' => '2026-05-12 00:31:06',
                'updated_at' => '2026-05-12 00:31:06',
            ],
            [
                'id' => 20,
                'name' => 'Rent',
                'organization_id' => 17,
                'description' => 'Monthly electricity bill associated with tenant rent',
                'status' => 1,
                'created_at' => '2026-05-13 22:59:20',
                'updated_at' => '2026-05-13 22:59:20',
            ],
            [
                'id' => 21,
                'name' => 'WindowFix',
                'organization_id' => 17,
                'description' => 'Window was broken',
                'status' => 1,
                'created_at' => '2026-05-13 23:36:48',
                'updated_at' => '2026-05-13 23:36:48',
            ],
>>>>>>> c57bb21 (subscription module)
        ]);
    }
}
