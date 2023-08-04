<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\SkillSection;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SkillSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Clear data
        Schema::disableForeignKeyConstraints();
        SkillSection::query()->delete();
        Schema::enableForeignKeyConstraints();

        //Skill sections
        SkillSection::create(['name' => "Front end"]);
        SkillSection::create(['name' => "Back end"]);
        SkillSection::create(['name' => "Design"]);
        SkillSection::create(['name' => "Frameworks"]);
    }
}
