<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'name_nl' => 'Honden',
            'name_fr' => 'Chiens',
            'name_en' => 'Dogs',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name_nl' => 'Katten',
            'name_fr' => 'Chats',
            'name_en' => 'Cats',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name_nl' => 'Vissen',
            'name_fr' => 'Poissons',
            'name_en' => 'Fish',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name_nl' => 'Vogels',
            'name_fr' => 'Oiseaux',
            'name_en' => 'Birds',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name_nl' => 'Kleine dieren',
            'name_fr' => 'Animaux petits',
            'name_en' => 'Small animals',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name_nl' => 'Andere',
            'name_fr' => "D'autres",
            'name_en' => 'Other',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
    }
}
