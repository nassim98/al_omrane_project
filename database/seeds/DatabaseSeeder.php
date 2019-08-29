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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@laraadmin.com',
            'password' => bcrypt('adminadmin'),
        ]);
        DB::table('etapes')->insert([
            [
                'libelle'=>'DG',
                'description'=>'Directeur Generale'
            ],
            [
                'libelle'=>'DGA',
                'description'=>'Directeur Generale Adjoint'
            ],
            [
                'libelle'=>'DSI',
                'description'=>'Division Systemes d\'information'
            ],
            [
                'libelle'=>'DJ',
                'description'=>'Division Juridique'
            ],
            [
                'libelle'=>'DQDD',
                'description'=>'Division Qualite et Devlopemet Durable'
            ],
            [
                'libelle'=>'DTI',
                'description'=>'Direction Technique et Ingenierie'
            ],
            [
                'libelle'=>'DCM',
                'description'=>'Direction Commerciale et Marketing'
            ],
            [
                'libelle'=>'DRH',
                'description'=>'Direction Ressources Humaines'
            ],
            [
                'libelle'=>'DFCG',
                'description'=>'Direction Financiere et Controle de Gestion'
            ],
            [
                'libelle'=>'AG',
                'description'=>'Agence Territoriales'
            ],
            [
                'libelle'=>'BO',
                'description'=>'Bureau d\'Ordre'
            ],
        ]);

        factory(App\Document::class, 10)->create();
    }
}
