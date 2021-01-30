<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();
        $json = File::get("database/data/departamentos.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            State::create(array(
                'id' => $obj->CodDepartamento,
                'name' => $obj->NomDepartamento,
            ));
        }
    }
}
