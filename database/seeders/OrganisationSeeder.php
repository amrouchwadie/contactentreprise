<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisations')->insert([
            [
                'id' => 1,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-02-10 10:09:46'),
                'deleted_at' => null,
                'cle' => '850e8f3e0c62d21e31e15ee3fc66e02a',
                'nom' => 'Leveque',
                'adresse' => '84, place de Lesage',
                'code_postal' => '11076',
                'ville' => 'Lenoir',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 2,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-02-10 16:22:34'),
                'deleted_at' => null,
                'cle' => '7c59df2040df0cbac1ef2c3232433c23',
                'nom' => 'Lemaitre Lefebvre S.A.R.L.',
                'adresse' => '21, boulevard Claude Dumas',
                'code_postal' => '17915',
                'ville' => 'Parent-la-Forêt',
                'statut' => 'LEAD'
            ],
            [
                'id' => 3,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2022-09-01 12:26:50'),
                'deleted_at' => null,
                'cle' => '1bf6aceb34ec5f72fec8f5225349dcc4',
                'nom' => 'Gregoire SARL',
                'adresse' => '428, rue Ferreira',
                'code_postal' => '39450',
                'ville' => 'Dumont',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 4,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-04-02 10:34:58'),
                'deleted_at' => null,
                'cle' => 'ce87d538d496114cdb8db4a4033e222c',
                'nom' => 'Leroy Gaudin SAS',
                'adresse' => '55, rue de Becker',
                'code_postal' => '00500',
                'ville' => 'Fournier',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 5,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-04-02 10:34:58'),
                'deleted_at' => null,
                'cle' => '9da098e53aa7e10a567fcb227205ea8a',
                'nom' => 'Ruiz',
                'adresse' => '405, avenue Gaillard',
                'code_postal' => '59521',
                'ville' => 'Hamon',
                'statut' => 'LEAD'
            ],
            [
                'id' => 6,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-02-10 16:23:14'),
                'deleted_at' => null,
                'cle' => '3bf69025a439bfe3acc62ce7c8da3ec1',
                'nom' => 'Leblanc',
                'adresse' => '937, rue Allain',
                'code_postal' => '48100',
                'ville' => 'Fontaine-sur-Ferrand',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 7,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-02-10 16:03:44'),
                'deleted_at' => null,
                'cle' => '530160ff370b3141d318b49dbf6a7d70',
                'nom' => 'Evrard et Fils',
                'adresse' => '1, rue de Fernandez',
                'code_postal' => '45161',
                'ville' => 'Poirier',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 8,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-05-31 13:18:51'),
                'deleted_at' => null,
                'cle' => '35b5bfdbc45a8dbd75dc0bb38bdad0d1',
                'nom' => 'Didier Allain S.A.R.L.',
                'adresse' => '636, place Benjamin Guerin',
                'code_postal' => '14217',
                'ville' => 'Adamdan',
                'statut' => 'LEAD'
            ],
            [
                'id' => 9,
                'created_at' => Carbon::parse('2020-11-26 00:08:19'),
                'updated_at' => Carbon::parse('2021-02-10 16:22:22'),
                'deleted_at' => null,
                'cle' => '53129dfc9d0dd27a0cb64ea9a925c9fb',
                'nom' => 'De Sousa SARL',
                'adresse' => '73, chemin Émilie Devaux',
                'code_postal' => '62607',
                'ville' => 'Garnier-sur-Mer',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 10,
                'created_at' => Carbon::parse('2020-11-26 08:43:41'),
                'updated_at' => Carbon::parse('2021-02-10 16:21:59'),
                'deleted_at' => null,
                'cle' => '71bb9a28ed2d23a6212babd6ab382a5d',
                'nom' => 'Baudry Prevost SAS',
                'adresse' => '326, avenue de Caron',
                'code_postal' => '76170',
                'ville' => 'Camus-sur-Gallet',
                'statut' => 'LEAD'
            ],
            [
                'id' => 11,
                'created_at' => Carbon::parse('2020-11-26 08:43:41'),
                'updated_at' => Carbon::parse('2021-02-10 22:17:38'),
                'deleted_at' => null,
                'cle' => '2811f474cf40b78d41621b0ce0c97b4f',
                'nom' => 'Lévêque Sud-Ouest',
                'adresse' => '96, avenue de Delorme',
                'code_postal' => '11076',
                'ville' => 'Camus Ville',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 12,
                'created_at' => Carbon::parse('2020-11-26 08:43:41'),
                'updated_at' => Carbon::parse('2021-02-10 16:20:50'),
                'deleted_at' => null,
                'cle' => '29cebc05bb680d989cbca78294ebbf13',
                'nom' => 'Fernandez',
                'adresse' => '9, rue Jacquet',
                'code_postal' => '46187',
                'ville' => 'Vidal',
                'statut' => 'PROSPECT'
            ],
            [
                'id' => 13,
                'created_at' => Carbon::parse('2020-11-26 08:43:41'),
                'updated_at' => Carbon::parse('2021-02-10 22:17:38'),
                'deleted_at' => null,
                'cle' => 'f0f84046be5401c9781432d99b9054e0',
                'nom' => 'Hotel Mercure Toulouse St Georges',
                'adresse' => '8, rue Dominique Marques',
                'code_postal' => '31000',
                'ville' => 'Toulouse',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 14,
                'created_at' => Carbon::parse('2020-11-26 08:43:41'),
                'updated_at' => Carbon::parse('2021-02-10 16:21:47'),
                'deleted_at' => null,
                'cle' => '9b7f81db911f7a5a3ec2739076ae8089',
                'nom' => 'Chretien',
                'adresse' => '40, boulevard de Pinto',
                'code_postal' => '37714',
                'ville' => 'TurpinBourg',
                'statut' => 'LEAD'
            ],
            [
                'id' => 15,
                'created_at' => Carbon::parse('2020-11-26 08:43:41'),
                'updated_at' => Carbon::parse('2021-02-10 16:21:33'),
                'deleted_at' => null,
                'cle' => '9825e6b9381a6b5d2b5bc28369d26dc5',
                'nom' => 'Ollivier Fischer SARL',
                'adresse' => 'impasse de Lombard',
                'code_postal' => '19739',
                'ville' => 'Fischerboeuf',
                'statut' => 'LEAD'
            ],
            [
                'id' => 16,
                'created_at' => Carbon::parse('2020-11-26 08:43:41'),
                'updated_at' => Carbon::parse('2021-02-10 16:21:19'),
                'deleted_at' => null,
                'cle' => '2a4725e20aa0e1c9afa53a2ceac4b749',
                'nom' => 'Allard Durand S.A.R.L.',
                'adresse' => '6, impasse Guillot',
                'code_postal' => '38002',
                'ville' => 'Le Gall',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 17,
                'created_at' => Carbon::parse('2020-11-26 08:43:42'),
                'updated_at' => Carbon::parse('2021-02-10 16:19:12'),
                'deleted_at' => null,
                'cle' => 'bffbe22a70facb899791cb57d3b4d342',
                'nom' => 'Cohen Hebert S.A.R.L.',
                'adresse' => '3, chemin Barre',
                'code_postal' => '28400',
                'ville' => 'Marchand',
                'statut' => 'PROSPECT'
            ],
            [
                'id' => 18,
                'created_at' => Carbon::parse('2020-11-26 08:43:42'),
                'updated_at' => Carbon::parse('2021-02-10 16:21:08'),
                'deleted_at' => null,
                'cle' => 'fe3586667f6a0f2cec3cbed406140081',
                'nom' => 'Gilles S.A.',
                'adresse' => 'boulevard Maillard',
                'code_postal' => '23910',
                'ville' => 'Pineau',
                'statut' => 'LEAD'
            ],
            [
                'id' => 19,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 09:32:06'),
                'deleted_at' => null,
                'cle' => '9eeaecf732114d2bffa3fd2249e45eb0',
                'nom' => 'SARL BOUDOU',
                'adresse' => '10 RUE DE L ADONIS',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'PROSPECT'
            ],
            [
                'id' => 20,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:14:48'),
                'deleted_at' => null,
                'cle' => 'bac87046d16d7e404e221c3236d64d3e',
                'nom' => 'CM-OPTIQUE',
                'adresse' => 'ROUTE DE SETE',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 21,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => 'a252e67342dab01ce22d9804535aeae8',
                'nom' => 'SARL MARMOTTE',
                'adresse' => 'RUE DES NEREIDES',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 22,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => '4eb9948c074548afb9e6c974733d1f5e',
                'nom' => 'G.F MAINTENANCE',
                'adresse' => '4 RUE D ORION',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'LEAD'
            ],
            [
                'id' => 23,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => 'e6a784f91bcc45f016c7ceffa04483e3',
                'nom' => 'JMB HOLDING',
                'adresse' => 'ROUTE DE ROCHELONGUE',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'PROSPECT'
            ],
            [
                'id' => 24,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => 'c658df3da933af7dfffb01386f235a10',
                'nom' => 'MONVIN',
                'adresse' => '31 AVENUE GENERAL DE GAULLE',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'LEAD'
            ],
            [
                'id' => 25,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => 'fa52df18e703638e7ded5e7d58d8e0d0',
                'nom' => 'L3C',
                'adresse' => '14 RUE CAPITAINE VAISSEAU ESCANDE',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'PROSPECT'
            ],
            [
                'id' => 26,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => 'e938e411f729c404079e1d3731988b82',
                'nom' => 'MOM THERON',
                'adresse' => '33 AVENUE DE LA BUTTE',
                'code_postal' => '34300',
                'ville' => 'AGDE',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 27,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => '075bacd88b0b06001f3b5ea04b064d5c',
                'nom' => 'L\'ARBRE A TIROIRS',
                'adresse' => 'LESTRADE',
                'code_postal' => '12520',
                'ville' => 'AGUESSAC',
                'statut' => 'PROSPECT'
            ],
            [
                'id' => 28,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => '474ad67bd56473fb26ce4bc704091c8b',
                'nom' => 'MATCAM',
                'adresse' => 'PLACE ANATOLE FRANCE',
                'code_postal' => '30220',
                'ville' => 'AIGUES MORTES',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 29,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => '2bc3ffcc65e9f50c4269837e82806da2',
                'nom' => 'STELO',
                'adresse' => '271 AVENUE DES ARTISANS',
                'code_postal' => '30220',
                'ville' => 'AIGUES MORTES',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 30,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => 'fb048c10c3c6b3ec555bdb1890c1c636',
                'nom' => 'E.A.T. ENTREPRISE AIMARGUOISE DE TERRASSEMENT',
                'adresse' => '8 CHEMIN DE L ABRIVADO',
                'code_postal' => '30470',
                'ville' => 'AIMARGUES',
                'statut' => 'CLIENT'
            ],
            [
                'id' => 31,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => '13a421f8517379d10db4cdd19fa729f9',
                'nom' => 'SARL JOUETTE',
                'adresse' => '125 RUE ANDRE MALRAUX',
                'code_postal' => '30100',
                'ville' => 'ALES',
                'statut' => 'PROSPECT'
            ],
            [
                'id' => 32,
                'created_at' => Carbon::parse('2021-08-03 08:11:07'),
                'updated_at' => Carbon::parse('2021-08-03 08:11:07'),
                'deleted_at' => null,
                'cle' => 'f713ab4d886839308ed6064b1d23c159',
                'nom' => 'SASHOIL',
                'adresse' => '603 CHEMIN DE CHAUDEBOIS',
                'code_postal' => '30100',
                'ville' => 'ALES',
                'statut' => 'PROSPECT'
            ]
        ]);
    }
}
