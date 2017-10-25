<?php

use Illuminate\Database\Seeder;

class SejarahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Sejarah::class, 35)->create();
    }
}
