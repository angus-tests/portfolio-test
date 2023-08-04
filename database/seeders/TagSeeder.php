<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Tag;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
class TagSeeder extends Seeder
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
      Tag::query()->delete();
      Schema::enableForeignKeyConstraints();


      //Web
      Tag::create([
          'name' => "Web",
      ]);

      //PHP
      Tag::create([
        'name' => "PHP",
        'colour' => "#A5B4FB",
        'text_colour' => "#26274b"
      ]);

      //Bootstrap
      Tag::create([
        'name' => "Bootstrap",
        'colour' => "#8113F4",
        'text_colour' => "#FFFFFF"
      ]);


      //Bulma
      Tag::create([
        'name' => "Bulma",
        'colour' => "#00C7A9",
        'text_colour' => "#072720"
      ]);

      //Python
      Tag::create([
         'name' => "Python",
         'colour' => "#FECE3A",
         'text_colour' => "#493e1b"
      ]);

      //Javascript
      Tag::create([
         'name' => "Javascript",
         'colour' => "#EFDC4F",
         'text_colour' => "#000000"
      ]);

      //Jquery
      Tag::create([
         'name' => "jQuery",
         'colour' => "#0268AD",
         'text_colour' => "#FFFFFF"
      ]);

    }
}
