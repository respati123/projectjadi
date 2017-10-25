<?php

use Illuminate\Database\Seeder;

class KategoriSejarahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\KategoriSejarah::class, 6)->create();
    }
}
