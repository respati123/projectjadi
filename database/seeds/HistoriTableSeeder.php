<?php

use Illuminate\Database\Seeder;

class HistoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Histori::class, 50)->create();        
    }
}
