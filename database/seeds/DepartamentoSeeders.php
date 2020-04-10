<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Departamento;

class DepartamentoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          DB::table('departamentos')->insert([
            'departamento'     => 'Tecnologiia',
            'descripcion' =>''
        ]);
          DB::table('departamentos')->insert([
            'departamento'     => 'Contabilidad',
            'descripcion' =>''
        ]);
          DB::table('departamentos')->insert([
            'departamento'     => 'Mercadeo',
            'descripcion' =>''
        ]);
          DB::table('departamentos')->insert([
            'departamento'     => 'Tienda',
            'descripcion' =>''
        ]);
          DB::table('departamentos')->insert([
            'departamento'     => 'Finanzas',
            'descripcion' =>''
        ]);
          DB::table('departamentos')->insert([
            'departamento'     => 'Servicios Generales',
            'descripcion' =>''
        ]);
          DB::table('departamentos')->insert([
            'departamento'     => 'Tecnologiia',
            'descripcion' =>''
        ]);
    }
}
