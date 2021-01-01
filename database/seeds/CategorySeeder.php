<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class)->create(
            [
                'name'=>'Produtos',
            ]
        );  

        factory(App\Category::class)->create([
            'name'=>'Servicos'
        ]);
    }
}