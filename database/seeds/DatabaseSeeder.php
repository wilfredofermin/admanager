<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartamentoSeeders::class);
        $this->call(LocalidadSeeders::class);
        $this->call(SupervisorSeeders::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
