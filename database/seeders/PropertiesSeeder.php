<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
<<<<<<< HEAD
            'id'                 => 2,
            'position_id'        => 2,
            'name'               => 'Flat-1',
            'address'            => 'Mirpur DOHS',
            'status'             => 1,
            'created_at'         => Carbon::parse('2025-05-25 02:35:42'),
            'updated_at'         => Carbon::parse('2025-05-25 04:19:20'),
=======
            [
                'id' => 2,
                'position_id' => 3,
                'name' => 'Flat-1',
                'address' => 'Mirpur DOHS',
                'organization_id' => 15,
                'status' => 1,
                'created_at' => '2025-05-24 20:35:42',
                'updated_at' => '2026-05-12 00:53:02',
            ],
            [
                'id' => 3,
                'position_id' => 1,
                'name' => 'Flat-2',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh',
                'organization_id' => 16,
                'status' => 1,
                'created_at' => '2026-05-12 00:48:26',
                'updated_at' => '2026-05-12 08:30:32',
            ],
            [
                'id' => 4,
                'position_id' => 2,
                'name' => 'Younush Munshi House - Hindubari, Shariatpur- Bangladesh',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh',
                'organization_id' => 16,
                'status' => 1,
                'created_at' => '2026-05-12 00:56:15',
                'updated_at' => '2026-05-12 02:53:44',
            ],
            [
                'id' => 5,
                'position_id' => 3,
                'name' => 'Flat-2',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh',
                'organization_id' => 16,
                'status' => 1,
                'created_at' => '2026-05-12 02:18:49',
                'updated_at' => '2026-05-12 08:31:35',
            ],
            [
                'id' => 6,
                'position_id' => 2,
                'name' => '1 BHK Flat',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh',
                'organization_id' => 15,
                'status' => 1,
                'created_at' => '2026-05-12 02:27:10',
                'updated_at' => '2026-05-12 02:27:10',
            ],
            [
                'id' => 7,
                'position_id' => 4,
                'name' => 'Darsarta Sheikh House',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh',
                'organization_id' => 17,
                'status' => 1,
                'created_at' => '2026-05-13 23:01:48',
                'updated_at' => '2026-05-13 23:01:48',
            ],
>>>>>>> c57bb21 (subscription module)
        ]);
    }
}
