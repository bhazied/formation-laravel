<?php

use Illuminate\Database\Seeder;

class category_annonce extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 5)->create()->each(function($category){
            $category->annonces()->save(factory(App\Annonce::class)->make());
        });
    }
}
