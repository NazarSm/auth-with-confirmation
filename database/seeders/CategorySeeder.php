<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [ 'title' => 'Beauté / Bien être / Santé / Parapharmacie' ] ,
            [ 'title' => 'Boucherie / Charcuterie'  ] ,
            [ 'title' => 'Boulangerie / Pâtisserie / Chocolaterie ] ,' ] ,
            [ 'title' => 'Cavistes / Vignerons / Producteurs de boissons' ] ,
            [ 'title' => 'Décoration / Arts de la Table / Accessoires' ] ,
            [ 'title' => 'Epicerie / Alimentation générale' ] ,
            [ 'title' => 'Fleuriste / Pépinière' ] ,
            [ 'title' => 'Laiterie / Fromagerie ' ] ,
            [ 'title' => 'Maraîchers / Production agricole / Elevages' ] ,
            [ 'title' => 'Poissonnerie / Produits de la mer / Pêcheurs' ] ,
            [ 'title' => 'Restaurants / Bars' ] ,
            [ 'title' => 'Tabac / Presse' ] ,
            [ 'title' => 'Vêtements / Chaussures / Accessoires / Bijoux']

        ];
        DB::table('categories')->insert($categories);
    }
}
