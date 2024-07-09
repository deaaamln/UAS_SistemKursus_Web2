<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'course_id' => 1,
            'start_date' => '2024-07-01 10:00:00',
            'end_date' => '2024-07-01 12:00:00',
        ]);

        Schedule::create([
            'course_id' => 1,
            'start_date' => '2024-07-02 10:00:00',
            'end_date' => '2024-07-02 12:00:00',
        ]);

    }
}
