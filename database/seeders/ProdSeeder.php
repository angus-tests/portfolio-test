<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdSeeder extends Seeder
{
    /**
     * Seed the application's database
     * for developer purposes
     *
     * @return void
     */
    public function run()
    {
      // \App\Models\User::factory(10)->create();
      $this->call(CategorySeeder::class);
      $this->call(TagSeeder::class);
      $this->call(RoleSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(SkillSectionSeeder::class);
      $this->call(SkillSeeder::class);
      $this->call(EducationSeeder::class);
      $this->call(EmploymentSeeder::class);
    }
}
