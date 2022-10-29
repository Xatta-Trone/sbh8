<?php

namespace App\Console\Commands;

use App\Models\Admin\AlumniData;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateAlumniInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alumni:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrates old alumni info to the new table';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('alumni_data')->truncate();
        $alumniData = [];
        $time = Carbon::now();

        DB::table('registration_forms')->orderBy('id')->chunk(2, function ($users) use ($time, $alumniData) {
            foreach ($users as $user) {
                $alumniData[] = [
                    'name' => $user->name,
                    'unique_id' => $user->order_id,
                    'nick_name' => $user->nick_name,
                    'department' => $user->department,
                    'exam_session' => $user->exam_session,
                    'graduation_year' => $user->graduation_year,
                    'attachment' => $user->attachment,
                    'room_no' => $user->room_no,
                    'hall_duration' => $user->hall_duration,
                    // 'birth_date' => $user->birthdate ? Carbon::parse($user->birthdate) : null,
                    'gender' => $user->gender,
                    'present_address' => $user->present_address,
                    'hobby' => $user->hobby,
                    'postcode' => $user->postcode,
                    'mobile_1' => $user->mobile_1,
                    'mobile_2' => $user->mobile_2,
                    'email' => $user->email,
                    'occupation' => $user->occupation,
                    'position' => $user->position,
                    'organization' => $user->organization,
                    'image' => $user->image,
                    'created_at' => $time,
                    'updated_at' => $time,
                    'status' => 1,
                ];
            }
            // dd($alumniData);
            AlumniData::insert($alumniData);
        });
    }
}