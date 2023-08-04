<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\User;
use App\Models\Role;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
class UserSeeder extends Seeder
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
      User::query()->delete();
      Schema::enableForeignKeyConstraints();


      $superAdminRole=Role::where('name', '=', 'Super Admin')->firstOrFail();

      if(config('admin.admin_name')) {
        $admin=User::create([
          'name' => config('admin.admin_name'),
          'email' => config('admin.admin_email'),
          'role_id' => $superAdminRole->id,
          'password' => (config('admin.admin_password')),
        ]);
      }
      
    }
}
