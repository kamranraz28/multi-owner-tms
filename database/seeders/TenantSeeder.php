<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenants')->insert([
            [
                'id' => 2,
                'property_id' => 2,
                'name' => 'Kamran',
<<<<<<< HEAD
=======
                'organization_id' => null,
>>>>>>> c57bb21 (subscription module)
                'phone' => '01609758377',
                'address' => 'Mymensingh',
                'nid_number' => '1234567896',
                'nid_upload' => null,
                'status' => 1,
                'invoicing' => 0,
                'invoice_month' => 0,
<<<<<<< HEAD
                'created_at' => '2025-05-25 03:31:52',
                'updated_at' => '2025-05-27 02:05:18',
=======
                'created_at' => '2025-05-24 21:31:52',
                'updated_at' => '2025-05-26 20:05:18',
            ],
            [
                'id' => 3,
                'property_id' => 5,
                'name' => 'Jenna Sparks',
                'organization_id' => null,
                'phone' => '01763422670',
                'address' => 'Debitis voluptate ea',
                'nid_number' => '64123355',
                'nid_upload' => null,
                'status' => 1,
                'invoicing' => 1,
                'invoice_month' => 1,
                'created_at' => '2026-05-12 02:41:37',
                'updated_at' => '2026-05-12 02:41:37',
            ],
            [
                'id' => 7,
                'property_id' => 4,
                'name' => 'Majnu Khan',
                'organization_id' => 16,
                'phone' => '01930174751',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh',
                'nid_number' => '12345678909',
                'nid_upload' => 'uploads/Q9VYdql0MJruxTKamjGmvEaDYFyjNv8qwUQPVoJH.png',
                'status' => 1,
                'invoicing' => 1,
                'invoice_month' => 1,
                'created_at' => '2026-05-12 04:06:36',
                'updated_at' => '2026-05-12 04:07:02',
            ],
            [
                'id' => 10,
                'property_id' => 2,
                'name' => 'Ali Bin Siraj',
                'organization_id' => 15,
                'phone' => '01930174754',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh',
                'nid_number' => '12345618901',
                'nid_upload' => 'uploads/V2d8eUbHo5deiMI5BqLkrXVd1Dn29vEdDltZSk6h.png',
                'status' => 1,
                'invoicing' => 1,
                'invoice_month' => 1,
                'created_at' => '2026-05-12 04:19:14',
                'updated_at' => '2026-05-12 04:19:14',
            ],
            [
                'id' => 11,
                'property_id' => 6,
                'name' => 'Yeasmin Akter',
                'organization_id' => 15,
                'phone' => '01930174756',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh',
                'nid_number' => '123456189872',
                'nid_upload' => 'uploads/Wzxx2psOvvf7Q6T2pri5eWdTfFPQwXFgFT8yNLBe.png',
                'status' => 1,
                'invoicing' => 1,
                'invoice_month' => 1,
                'created_at' => '2026-05-12 04:21:14',
                'updated_at' => '2026-05-12 04:21:14',
            ],
            [
                'id' => 12,
                'property_id' => 7,
                'name' => 'Jismin AKter',
                'organization_id' => 17,
                'phone' => '01930174730',
                'address' => 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh',
                'nid_number' => '12345678909',
                'nid_upload' => 'uploads/uDINqi08W5FmDHKMnGxsgIUCp0kXJZMTgpXc4Bnt.png',
                'status' => 1,
                'invoicing' => 1,
                'invoice_month' => 1,
                'created_at' => '2026-05-13 23:03:19',
                'updated_at' => '2026-05-14 00:23:02',
>>>>>>> c57bb21 (subscription module)
            ],
        ]);
    }
}
