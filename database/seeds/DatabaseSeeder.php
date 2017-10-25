<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(KategoriSejarahTableSeeder::class);
        $this->call(HistoriTableSeeder::class);
        $this->call(SejarahTableSeeder::class);
    }
}
