<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use DB;
use File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $json = File::get("database/data/municipios.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            City::create(array(
                'id' => $obj->CodMunicipio,
                'name' => $obj->NomMunicipio,
                'state_id' => $obj->CodDepartamento
            ));
        }
    }
}
