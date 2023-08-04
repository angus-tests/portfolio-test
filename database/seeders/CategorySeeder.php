<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
//Models
use App\Models\Category;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
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
      Category::query()->delete();
      Schema::enableForeignKeyConstraints();

      //Websites
      Category::create([
          'name' => "Websites",
          'short_name' => "Web",
          'slug'=> Str::slug('web', '-'),
      ]);

      //Mobile
      Category::create([
          'name' => "Mobile Apps",
          'short_name' => "Mobile",
          'slug'=> Str::slug('mobile', '-'),
      ]);

      //Desktop
      Category::create([
          'name' => "Desktop Applications",
          'short_name' => "Desktop",
          'slug'=> Str::slug('desktop', '-'),
      ]);
    }
}
