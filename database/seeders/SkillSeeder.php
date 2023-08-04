<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Skill;
use App\Models\SkillSection;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class SkillSeeder extends Seeder
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
        Skill::query()->delete();
        Schema::enableForeignKeyConstraints();

        //Get skill sections
        $front_end=SkillSection::where('name', '=', 'Front end')->firstOrFail();
        $back_end=SkillSection::where('name', '=', 'Back end')->firstOrFail();
        $designer=SkillSection::where('name', '=', 'Design')->firstOrFail();
        $frameworks=SkillSection::where('name', '=', 'Frameworks')->firstOrFail();

        //Generate some skills
        Skill::create(['skill_section_id' => $front_end->id, "Name" => "Javascript"]);
        Skill::create(['skill_section_id' => $front_end->id, "Name" => "HTML"]);
        Skill::create(['skill_section_id' => $front_end->id, "Name" => "CSS"]);

        Skill::create(['skill_section_id' => $back_end->id, "Name" => "PHP"]);
        Skill::create(['skill_section_id' => $back_end->id, "Name" => "MYSQL"]);

        Skill::create(['skill_section_id' => $designer->id, "Name" => "Sketch"]);
        Skill::create(['skill_section_id' => $designer->id, "Name" => "Affinity"]);

        Skill::create(['skill_section_id' => $frameworks->id, "Name" => "Laravel"]);
        Skill::create(['skill_section_id' => $frameworks->id, "Name" => "Rails"]);



    }
}
