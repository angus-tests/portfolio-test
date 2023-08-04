<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;
use App\Models\Tag;
use App\Models\Category;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
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
      Project::query()->delete();
      DB::table('project_tags')->delete();
      Schema::enableForeignKeyConstraints();

      //Redwood
      $redwood=Project::create([
          'name' => "Redwood",
          'slug'=> Str::slug('redwood', '-'),
          'active' => 1,
          'category_id' => Category::where('name', '=', 'Websites')->firstOrFail()->id,
          'short_desc' => "A website for a small marketing company",
          'long_desc' => "A long description describing the Redwood website would go here",
          'web_link' => "https://www.redwood.business",
          'date_made' => Carbon::parse('2021-03-03'),
          'img' => "redwood.jpg",
      ]);

      //Redwood Tags
      $data = [
          ['project_id'=> $redwood->id, 'tag_id'=> Tag::where('name', '=', 'Web')->firstOrFail()->id],
          ['project_id'=> $redwood->id, 'tag_id'=> Tag::where('name', '=', 'PHP')->firstOrFail()->id],
          ['project_id'=> $redwood->id, 'tag_id'=> Tag::where('name', '=', 'Bootstrap')->firstOrFail()->id],
      ];
      DB::table('project_tags')->insert($data);


      //Passworld
      $passworld=Project::create([
          'name' => "Passworld",
          'slug'=> Str::slug('passworld', '-'),
          'active' => 1,
          'category_id' => Category::where('name', '=', 'Websites')->firstOrFail()->id,
          'short_desc' => "A website for a generating and learning about passwords",
          'long_desc' => "A long description describing the Passworld website would go here",
          'web_link' => "https://www.passworld.co.uk",
          'date_made' => Carbon::parse('2021-08-01'),
          'img' => "passworld.jpg",
      ]);

      //Password Tags
      $data = [
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'Web')->firstOrFail()->id],
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'PHP')->firstOrFail()->id],
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'Bulma')->firstOrFail()->id],
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'jQuery')->firstOrFail()->id],

      ];
      DB::table('project_tags')->insert($data);


      // Kool App
      $Kool=Project::create([
          'name' => "Kool App",
          'slug'=> Str::slug('kool app', '-'),
          'active' => 1,
          'category_id' => Category::where('name', '=', 'Mobile Apps')->firstOrFail()->id,
          'short_desc' => "A simple, kool mobile app",
          'long_desc' => "A long description describing the Kool App would go here",
          'date_made' => Carbon::parse('2015-08-01'),
      ]);

      // PyPassword
      $pypassword=Project::create([
          'name' => "PyPassword",
          'slug'=> Str::slug('pypassword', '-'),
          'active' => 1,
          'category_id' => Category::where('name', '=', 'Desktop Applications')->firstOrFail()->id,
          'short_desc' => "A tool for storing passwords on desktop",
          'long_desc' => "A long description describing PyPassword here",
          'date_made' => Carbon::parse('2018-01-01'),
      ]);
      
    }

    
}
