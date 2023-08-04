<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
//Models
use App\Models\Block;
use App\Models\Project;

class BlockSeeder extends Seeder
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
        Block::query()->delete();
        Schema::enableForeignKeyConstraints();

        //Redwood block
        $tam=Block::create([
            'path' => "redwood.tamworth",
            'name'=> 'Tamworth born business',
        ]);

        $redwood=Project::where("slug","=","redwood")->firstOrFail();
        $redwood->blocks()->sync([$tam->id => ["order"=>0]]);
    }
}
