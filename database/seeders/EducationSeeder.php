<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Education;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear data
        Schema::disableForeignKeyConstraints();
        Education::query()->delete();
        Schema::enableForeignKeyConstraints();

        // Polesworth
        Education::create([
            'institute' => "Polesworth School",
            'level' => "GCSE",
            'start_date' => Carbon::parse('2011-01-09'),
            'end_date' => Carbon::parse('2016-01-07'),
        ]);

        // KEC
        Education::create([
            'institute' => "King Edward VI College",
            'level' => "A level",
            'start_date' => Carbon::parse('2016-01-09'),
            'end_date' => Carbon::parse('2018-01-07'),
        ]);

        // Sheffield
        Education::create([
            'institute' => "University of Sheffield",
            'level' => "Bsc Computer Science (First-Class Honours)",
            'start_date' => Carbon::parse('2019-01-09'),
            'end_date' => Carbon::parse('2023-01-06'),
        ]);
    }
}
