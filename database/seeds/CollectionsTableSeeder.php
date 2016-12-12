<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collections')->delete();
        DB::table('collections')->insert([
            'name_nl' => 'Splash en plezier',
            'name_fr' => 'Splash et la plaisir',
            'name_en' => "Splash 'n fun",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('collections')->insert([
            'name_nl' => 'Luxueus',
            'name_fr' => 'Luxueux',
            'name_en' => 'Luxury',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('collections')->insert([
            'name_nl' => 'Nieuw',
            'name_fr' => 'Nouveau',
            'name_en' => 'New',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('collections')->insert([
            'name_nl' => 'Korting',
            'name_fr' => 'Réduction',
            'name_en' => 'On sale',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('collections')->insert([
            'name_nl' => 'Andere',
            'name_fr' => "D'autres",
            'name_en' => 'Other',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
