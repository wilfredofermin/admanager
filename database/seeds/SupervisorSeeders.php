<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Supervisor;
class SupervisorSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('supervisors')->insert([
            'nombre'     => 'Juan Lucas',
            'username' =>'jlucas'
            ]);

            DB::table('supervisors')->insert([
            'nombre'     => 'Pedro Garcia',
            'username' =>'pgarcia'
            ]);

            DB::table('supervisors')->insert([
            'nombre'     => 'Wilfredo Fermin R',
            'username' =>'wfermin'
            ]);
    }
}
