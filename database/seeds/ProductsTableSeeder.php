<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
            'name_nl' => 'Verkoelende mat',
            'name_fr' => 'Petit tapis de refroidissement',
            'name_en' => 'Cooling mat',
            'description_nl' => 'Met deze verkoelende mat kan je hond afkoelen tijdens die zwoele zomerdagen.',
            'description_fr' => "Avec ce petit tapis de refroidissement votre chien peut toujours se rafraîchir pendant les jours chauds d'été.",
            'description_en' => 'With this cooling mat, your dog will be able to cool down, even during hot summerdays.',
            'price' => '15.49',
            'category_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
