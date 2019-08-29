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
        DB::table('scenarios')->insert([
            [
                'nom'=>'Scen_Fac',
                'suivi'=>'11:1:10:6:9',
                'delais'=>'3:3:3:3:3'
            ],
            [
                'nom'=>'Scen_1',
                'suivi'=>'1:2:3:4:5',
                'delais'=>'2:2:2:2:2'
            ],
            [
                'nom'=>'Scen_2',
                'suivi'=>'2:3:4:5:6',
                'delais'=>'2:2:3:3:2'
            ],
            [
                'nom'=>'Scen_3',
                'suivi'=>'10:9:8:7:6',
                'delais'=>'2:3:4:3:2'
            ],
        ]);

        factory(App\Document::class, 10)->create();
    }
}
