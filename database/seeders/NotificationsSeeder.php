<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notifications')->insert([
            [
                'id' => 4,
                'user_id' => null,
                'message' => 'Kajal created a perission- per_create',
                'is_read' => 0,
                'created_by' => 2,
<<<<<<< HEAD
                'created_at' => '2024-10-07 05:47:27',
                'updated_at' => '2025-02-16 02:31:29',
                'notifiable_type' => null,
                'notifiable_id' => 1,
=======
                'notifiable_type' => null,
                'notifiable_id' => 1,
                'created_at' => '2024-10-06 23:47:27',
                'updated_at' => '2025-02-15 20:31:29',
>>>>>>> c57bb21 (subscription module)
            ],
            [
                'id' => 11,
                'user_id' => null,
                'message' => 'Kamran created a perission- notification_access',
                'is_read' => 0,
                'created_by' => 1,
<<<<<<< HEAD
                'created_at' => '2024-10-08 04:56:25',
                'updated_at' => '2025-02-16 02:31:29',
                'notifiable_type' => null,
                'notifiable_id' => 1,
=======
                'notifiable_type' => null,
                'notifiable_id' => 1,
                'created_at' => '2024-10-07 22:56:25',
                'updated_at' => '2025-02-15 20:31:29',
>>>>>>> c57bb21 (subscription module)
            ],
            [
                'id' => 12,
                'user_id' => null,
                'message' => 'Kamran created a perission- user_configuration',
                'is_read' => 0,
                'created_by' => 1,
<<<<<<< HEAD
                'created_at' => '2024-10-08 05:06:37',
                'updated_at' => '2025-02-16 02:31:29',
                'notifiable_type' => null,
                'notifiable_id' => 1,
=======
                'notifiable_type' => null,
                'notifiable_id' => 1,
                'created_at' => '2024-10-07 23:06:37',
                'updated_at' => '2025-02-15 20:31:29',
>>>>>>> c57bb21 (subscription module)
            ],
            [
                'id' => 13,
                'user_id' => null,
                'message' => 'Kamran created a perission- software_settings',
                'is_read' => 0,
                'created_by' => 1,
<<<<<<< HEAD
                'created_at' => '2024-10-15 03:03:25',
                'updated_at' => '2025-02-16 02:31:29',
                'notifiable_type' => null,
                'notifiable_id' => 1,
=======
                'notifiable_type' => null,
                'notifiable_id' => 1,
                'created_at' => '2024-10-14 21:03:25',
                'updated_at' => '2025-02-15 20:31:29',
            ],
            [
                'id' => 14,
                'user_id' => null,
                'message' => 'Kamran Khan created a perission- system_configuration',
                'is_read' => 0,
                'created_by' => 1,
                'notifiable_type' => null,
                'notifiable_id' => 0,
                'created_at' => '2026-05-11 05:24:42',
                'updated_at' => '2026-05-11 05:24:42',
            ],
            [
                'id' => 15,
                'user_id' => 3,
                'message' => 'Kamran Khan created a user- Billal for role- organization_user',
                'is_read' => 0,
                'created_by' => 1,
                'notifiable_type' => null,
                'notifiable_id' => 0,
                'created_at' => '2026-05-11 22:47:59',
                'updated_at' => '2026-05-11 22:47:59',
            ],
            [
                'id' => 16,
                'user_id' => null,
                'message' => 'Kamran Khan created a perission- sidebar_reports',
                'is_read' => 0,
                'created_by' => 1,
                'notifiable_type' => null,
                'notifiable_id' => 0,
                'created_at' => '2026-05-14 02:31:21',
                'updated_at' => '2026-05-14 02:31:21',
>>>>>>> c57bb21 (subscription module)
            ],
        ]);
    }
}
