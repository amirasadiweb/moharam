<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class,10)->create();

    }
}
