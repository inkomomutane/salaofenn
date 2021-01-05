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
       factory(App\User::class,40)->create();  
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(TagSeeder::class);
        factory(App\ProductTag::class,40)->create(); 
        $this->call(CartSeeder::class);
        
    }
}