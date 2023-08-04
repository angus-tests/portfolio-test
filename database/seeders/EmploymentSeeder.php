<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Employment;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class EmploymentSeeder extends Seeder
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
        Employment::query()->delete();
        Schema::enableForeignKeyConstraints();

        // John Lewis
        Employment::create([
            'employer' => "John Lewis",
            'role' => "Stock Management",
            'start_date' => Carbon::parse('2018-01-10'),
            'end_date' => Carbon::parse('2019-01-01'),
            'description' => "Worked at John Lewis bruv"
        ]);


        // The Rose Inn
        Employment::create([
            'employer' => "The Rose Inn",
            'role' => "Waiter",
            'start_date' => Carbon::parse('2016-01-08'),
            'end_date' => Carbon::parse('2017-01-01'),
            'description' => "Worked at the Rose Inn"
        ]);

        // ONS
        Employment::create([
            'employer' => "Office For National Statistics",
            'role' => "Software Engineer",
            'start_date' => Carbon::parse('2021-01-10'),
        ]);
    }
}
