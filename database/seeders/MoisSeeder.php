<?php

namespace Database\Seeders;

use App\Models\Mois;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mois::truncate();
        $mois = [
            ['mois' => 'Janvier', 'sigle_mois' => 'Jan', 'quarter' => 'Q1','num_mois'=> 1],
            ['mois' => 'Février', 'sigle_mois' => 'Fev', 'quarter' => 'Q1','num_mois'=> 2],
            ['mois' => 'Mars', 'sigle_mois' => 'Mar', 'quarter' => 'Q1','num_mois'=> 3],
            ['mois' => 'Avril', 'sigle_mois' => 'Avr', 'quarter' => 'Q2','num_mois'=> 4],
            ['mois' => 'Mai', 'sigle_mois' => 'Mai', 'quarter' => 'Q2','num_mois'=> 5],
            ['mois' => 'Juin', 'sigle_mois' => 'Jun', 'quarter' => 'Q2','num_mois'=> 6],
            ['mois' => 'Juillet', 'sigle_mois' => 'Jul', 'quarter' => 'Q3','num_mois'=> 7],
            ['mois' => 'Aout', 'sigle_mois' => 'Aut', 'quarter' => 'Q3','num_mois'=> 8],
            ['mois' => 'Septembre', 'sigle_mois' => 'Sep', 'quarter' => 'Q3','num_mois'=> 9],
            ['mois' => 'Octobre', 'sigle_mois' => 'Oct', 'quarter' => 'Q4','num_mois'=> 10],
            ['mois' => 'Novembre', 'sigle_mois' => 'Nov', 'quarter' => 'Q4','num_mois'=> 11],
            ['mois' => 'Décembre', 'sigle_mois' => 'Dec', 'quarter' => 'Q4','num_mois'=> 12],
        ];

        foreach($mois as $mo){
                Mois::create($mo);
            }
         
    }
}
