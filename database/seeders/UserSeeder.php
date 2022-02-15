<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // AKADEMIK

        $akademik = User::create([
            'username' => 'akademikSV',
            'password' => bcrypt('123'),
            'id_user'  => '1',
        ]);

        $akademik->assignRole('akademik');



        // PANITIA

        $panitia = User::create([
            'username' => 'panitiaINF',
            'password' => bcrypt('123'),
            'id_user'  => '1',
        ]);

        $panitia->assignRole('panitia');

        $panitia = User::create([
            'username' => 'panitiaTEK',
            'password' => bcrypt('123'),
            'id_user'  => '2',
        ]);

        $panitia->assignRole('panitia');










        // DOSEN

        $dosen = User::create([
            'username' => 'aditya_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '1',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'aep_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '2',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'ahmad_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '3',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'amata_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '4',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'anggi_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '5',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'ardian_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '6',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'bayu_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '7',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'dean_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '8',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'faozan_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '9',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'hendra_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '10',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'inna_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '11',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'irmansyah_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '12',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'irzaman_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '13',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'nurdianti_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '14',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'wahjuni_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '15',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'dr_irman_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '16',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'karlisa_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '17',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'setyanto_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '18',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'shelvie_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '19',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'sony_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '20',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'annisa_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '21',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'heru_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '22',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'mahfuddin_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '23',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'faldiena_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '24',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'firman_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '25',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'gema_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '26',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'irman_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '27',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'medhanita_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '28',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'aziezah_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '29',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'agus_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '30',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'ridwan_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '31',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'ringga_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '32',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'sofiyanti_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '33',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'walidatush_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '34',
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'username' => 'wulandari_dosen',
            'password' => bcrypt('123'),
            'id_user'  => '35',
        ]);

        $dosen->assignRole('dosen');


















        // MAHASISWA

        $mahasiswa = User::create([
            'username' => 'J3C118136',
            'password' => bcrypt('123'),
            'id_user'  => '1',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C218183',
            'password' => bcrypt('123'),
            'id_user'  => '2',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C118018',
            'password' => bcrypt('J3C118018'),
            'id_user'  => '3',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119004',
            'password' => bcrypt('J3C119004'),
            'id_user'  => '4',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119005',
            'password' => bcrypt('J3C119005'),
            'id_user'  => '5',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119007',
            'password' => bcrypt('J3C119007'),
            'id_user'  => '6',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119008',
            'password' => bcrypt('J3C119008'),
            'id_user'  => '7',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119010',
            'password' => bcrypt('J3C119010'),
            'id_user'  => '8',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119016',
            'password' => bcrypt('J3C119016'),
            'id_user'  => '9',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119020',
            'password' => bcrypt('J3C119020'),
            'id_user'  => '10',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119022',
            'password' => bcrypt('J3C119022'),
            'id_user'  => '11',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119025',
            'password' => bcrypt('J3C119025'),
            'id_user'  => '12',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119027',
            'password' => bcrypt('J3C119027'),
            'id_user'  => '13',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119029',
            'password' => bcrypt('J3C119029'),
            'id_user'  => '14',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119032',
            'password' => bcrypt('J3C119032'),
            'id_user'  => '15',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119036',
            'password' => bcrypt('J3C119036'),
            'id_user'  => '16',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119037',
            'password' => bcrypt('J3C119037'),
            'id_user'  => '17',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119041',
            'password' => bcrypt('J3C119041'),
            'id_user'  => '18',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119042',
            'password' => bcrypt('J3C119042'),
            'id_user'  => '19',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119043',
            'password' => bcrypt('J3C119043'),
            'id_user'  => '20',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119044',
            'password' => bcrypt('J3C119044'),
            'id_user'  => '21',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119047',
            'password' => bcrypt('J3C119047'),
            'id_user'  => '22',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119049',
            'password' => bcrypt('J3C119049'),
            'id_user'  => '23',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119050',
            'password' => bcrypt('J3C119050'),
            'id_user'  => '24',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119051',
            'password' => bcrypt('J3C119051'),
            'id_user'  => '25',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119055',
            'password' => bcrypt('J3C119055'),
            'id_user'  => '26',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119057',
            'password' => bcrypt('J3C119057'),
            'id_user'  => '27',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119058',
            'password' => bcrypt('J3C119058'),
            'id_user'  => '28',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119062',
            'password' => bcrypt('J3C119062'),
            'id_user'  => '29',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119073',
            'password' => bcrypt('J3C119073'),
            'id_user'  => '30',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119075',
            'password' => bcrypt('J3C119075'),
            'id_user'  => '31',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119077',
            'password' => bcrypt('J3C119077'),
            'id_user'  => '32',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119079',
            'password' => bcrypt('J3C119079'),
            'id_user'  => '33',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119081',
            'password' => bcrypt('J3C119081'),
            'id_user'  => '34',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119086',
            'password' => bcrypt('J3C119086'),
            'id_user'  => '35',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119087',
            'password' => bcrypt('J3C119087'),
            'id_user'  => '36',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119090',
            'password' => bcrypt('J3C119090'),
            'id_user'  => '37',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119092',
            'password' => bcrypt('J3C119092'),
            'id_user'  => '38',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119105',
            'password' => bcrypt('J3C119105'),
            'id_user'  => '39',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119109',
            'password' => bcrypt('J3C119109'),
            'id_user'  => '40',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119111',
            'password' => bcrypt('J3C119111'),
            'id_user'  => '41',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119113',
            'password' => bcrypt('J3C119113'),
            'id_user'  => '42',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119115',
            'password' => bcrypt('J3C119115'),
            'id_user'  => '43',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119118',
            'password' => bcrypt('J3C119118'),
            'id_user'  => '44',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119120',
            'password' => bcrypt('J3C119120'),
            'id_user'  => '45',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119125',
            'password' => bcrypt('J3C119125'),
            'id_user'  => '46',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119129',
            'password' => bcrypt('J3C119129'),
            'id_user'  => '47',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119130',
            'password' => bcrypt('J3C119130'),
            'id_user'  => '48',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219136',
            'password' => bcrypt('J3C219136'),
            'id_user'  => '49',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219139',
            'password' => bcrypt('J3C219139'),
            'id_user'  => '50',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219140',
            'password' => bcrypt('J3C219140'),
            'id_user'  => '51',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219152',
            'password' => bcrypt('J3C219152'),
            'id_user'  => '52',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219156',
            'password' => bcrypt('J3C219156'),
            'id_user'  => '53',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219159',
            'password' => bcrypt('J3C219159'),
            'id_user'  => '54',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219165',
            'password' => bcrypt('J3C219165'),
            'id_user'  => '55',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219166',
            'password' => bcrypt('J3C219166'),
            'id_user'  => '56',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219168',
            'password' => bcrypt('J3C219168'),
            'id_user'  => '57',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219171',
            'password' => bcrypt('J3C219171'),
            'id_user'  => '58',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219177',
            'password' => bcrypt('J3C219177'),
            'id_user'  => '59',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219178',
            'password' => bcrypt('J3C219178'),
            'id_user'  => '60',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219180',
            'password' => bcrypt('J3C219180'),
            'id_user'  => '61',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219181',
            'password' => bcrypt('J3C219181'),
            'id_user'  => '62',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119003',
            'password' => bcrypt('J3C119003'),
            'id_user'  => '63',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119006',
            'password' => bcrypt('J3C119006'),
            'id_user'  => '64',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119014',
            'password' => bcrypt('J3C119014'),
            'id_user'  => '65',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119026',
            'password' => bcrypt('J3C119026'),
            'id_user'  => '66',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119028',
            'password' => bcrypt('J3C119028'),
            'id_user'  => '67',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119030',
            'password' => bcrypt('J3C119030'),
            'id_user'  => '68',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119038',
            'password' => bcrypt('J3C119038'),
            'id_user'  => '69',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119045',
            'password' => bcrypt('J3C119045'),
            'id_user'  => '70',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119048',
            'password' => bcrypt('J3C119048'),
            'id_user'  => '71',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119052',
            'password' => bcrypt('J3C119052'),
            'id_user'  => '72',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119053',
            'password' => bcrypt('J3C119053'),
            'id_user'  => '73',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119059',
            'password' => bcrypt('J3C119059'),
            'id_user'  => '74',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119060',
            'password' => bcrypt('J3C119060'),
            'id_user'  => '75',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119064',
            'password' => bcrypt('J3C119064'),
            'id_user'  => '76',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119066',
            'password' => bcrypt('J3C119066'),
            'id_user'  => '77',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119067',
            'password' => bcrypt('J3C119067'),
            'id_user'  => '78',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119072',
            'password' => bcrypt('J3C119072'),
            'id_user'  => '79',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119080',
            'password' => bcrypt('J3C119080'),
            'id_user'  => '80',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119082',
            'password' => bcrypt('J3C119082'),
            'id_user'  => '81',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119083',
            'password' => bcrypt('J3C119083'),
            'id_user'  => '82',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119084',
            'password' => bcrypt('J3C119084'),
            'id_user'  => '83',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119091',
            'password' => bcrypt('J3C119091'),
            'id_user'  => '84',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119093',
            'password' => bcrypt('J3C119093'),
            'id_user'  => '85',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119094',
            'password' => bcrypt('J3C119094'),
            'id_user'  => '86',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119095',
            'password' => bcrypt('J3C119095'),
            'id_user'  => '87',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119097',
            'password' => bcrypt('J3C119097'),
            'id_user'  => '88',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119098',
            'password' => bcrypt('J3C119098'),
            'id_user'  => '89',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119101',
            'password' => bcrypt('J3C119101'),
            'id_user'  => '90',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119102',
            'password' => bcrypt('J3C119102'),
            'id_user'  => '91',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119103',
            'password' => bcrypt('J3C119103'),
            'id_user'  => '92',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119104',
            'password' => bcrypt('J3C119104'),
            'id_user'  => '93',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119107',
            'password' => bcrypt('J3C119107'),
            'id_user'  => '94',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119112',
            'password' => bcrypt('J3C119112'),
            'id_user'  => '95',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119116',
            'password' => bcrypt('J3C119116'),
            'id_user'  => '96',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119119',
            'password' => bcrypt('J3C119119'),
            'id_user'  => '97',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119121',
            'password' => bcrypt('J3C119121'),
            'id_user'  => '98',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119122',
            'password' => bcrypt('J3C119122'),
            'id_user'  => '99',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119123',
            'password' => bcrypt('J3C119123'),
            'id_user'  => '100',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C119124',
            'password' => bcrypt('J3C119124'),
            'id_user'  => '101',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219133',
            'password' => bcrypt('J3C219133'),
            'id_user'  => '102',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219135',
            'password' => bcrypt('J3C219135'),
            'id_user'  => '103',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219137',
            'password' => bcrypt('J3C219137'),
            'id_user'  => '104',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219141',
            'password' => bcrypt('J3C219141'),
            'id_user'  => '105',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219142',
            'password' => bcrypt('J3C219142'),
            'id_user'  => '106',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219144',
            'password' => bcrypt('J3C219144'),
            'id_user'  => '107',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219148',
            'password' => bcrypt('J3C219148'),
            'id_user'  => '108',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219150',
            'password' => bcrypt('J3C219150'),
            'id_user'  => '109',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219153',
            'password' => bcrypt('J3C219153'),
            'id_user'  => '110',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219157',
            'password' => bcrypt('J3C219157'),
            'id_user'  => '111',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219158',
            'password' => bcrypt('J3C219158'),
            'id_user'  => '112',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219160',
            'password' => bcrypt('J3C219160'),
            'id_user'  => '113',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219167',
            'password' => bcrypt('J3C219167'),
            'id_user'  => '114',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219172',
            'password' => bcrypt('J3C219172'),
            'id_user'  => '115',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219175',
            'password' => bcrypt('J3C219175'),
            'id_user'  => '116',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219183',
            'password' => bcrypt('J3C219183'),
            'id_user'  => '117',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3C219184',
            'password' => bcrypt('J3C219184'),
            'id_user'  => '118',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119001',
            'password' => bcrypt('J3D119001'),
            'id_user'  => '119',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119005',
            'password' => bcrypt('J3D119005'),
            'id_user'  => '120',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119007',
            'password' => bcrypt('J3D119007'),
            'id_user'  => '121',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119008',
            'password' => bcrypt('J3D119008'),
            'id_user'  => '122',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119009',
            'password' => bcrypt('J3D119009'),
            'id_user'  => '123',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119010',
            'password' => bcrypt('J3D119010'),
            'id_user'  => '124',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119011',
            'password' => bcrypt('J3D119011'),
            'id_user'  => '125',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119015',
            'password' => bcrypt('J3D119015'),
            'id_user'  => '126',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119016',
            'password' => bcrypt('J3D119016'),
            'id_user'  => '127',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119017',
            'password' => bcrypt('J3D119017'),
            'id_user'  => '128',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119021',
            'password' => bcrypt('J3D119021'),
            'id_user'  => '129',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119023',
            'password' => bcrypt('J3D119023'),
            'id_user'  => '130',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119024',
            'password' => bcrypt('J3D119024'),
            'id_user'  => '131',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119027',
            'password' => bcrypt('J3D119027'),
            'id_user'  => '132',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119028',
            'password' => bcrypt('J3D119028'),
            'id_user'  => '133',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119030',
            'password' => bcrypt('J3D119030'),
            'id_user'  => '134',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119032',
            'password' => bcrypt('J3D119032'),
            'id_user'  => '135',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119033',
            'password' => bcrypt('J3D119033'),
            'id_user'  => '136',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119034',
            'password' => bcrypt('J3D119034'),
            'id_user'  => '137',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119035',
            'password' => bcrypt('J3D119035'),
            'id_user'  => '138',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119036',
            'password' => bcrypt('J3D119036'),
            'id_user'  => '139',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119039',
            'password' => bcrypt('J3D119039'),
            'id_user'  => '140',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119041',
            'password' => bcrypt('J3D119041'),
            'id_user'  => '141',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119042',
            'password' => bcrypt('J3D119042'),
            'id_user'  => '142',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119044',
            'password' => bcrypt('J3D119044'),
            'id_user'  => '143',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119048',
            'password' => bcrypt('J3D119048'),
            'id_user'  => '144',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119049',
            'password' => bcrypt('J3D119049'),
            'id_user'  => '145',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119052',
            'password' => bcrypt('J3D119052'),
            'id_user'  => '146',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119058',
            'password' => bcrypt('J3D119058'),
            'id_user'  => '147',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119059',
            'password' => bcrypt('J3D119059'),
            'id_user'  => '148',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119063',
            'password' => bcrypt('J3D119063'),
            'id_user'  => '149',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119065',
            'password' => bcrypt('J3D119065'),
            'id_user'  => '150',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119066',
            'password' => bcrypt('J3D119066'),
            'id_user'  => '151',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119067',
            'password' => bcrypt('J3D119067'),
            'id_user'  => '152',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119069',
            'password' => bcrypt('J3D119069'),
            'id_user'  => '153',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119072',
            'password' => bcrypt('J3D119072'),
            'id_user'  => '154',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119079',
            'password' => bcrypt('J3D119079'),
            'id_user'  => '155',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119081',
            'password' => bcrypt('J3D119081'),
            'id_user'  => '156',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119083',
            'password' => bcrypt('J3D119083'),
            'id_user'  => '157',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119084',
            'password' => bcrypt('J3D119084'),
            'id_user'  => '158',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119086',
            'password' => bcrypt('J3D119086'),
            'id_user'  => '159',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119089',
            'password' => bcrypt('J3D119089'),
            'id_user'  => '160',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119091',
            'password' => bcrypt('J3D119091'),
            'id_user'  => '161',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119092',
            'password' => bcrypt('J3D119092'),
            'id_user'  => '162',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119093',
            'password' => bcrypt('J3D119093'),
            'id_user'  => '163',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119094',
            'password' => bcrypt('J3D119094'),
            'id_user'  => '164',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119095',
            'password' => bcrypt('J3D119095'),
            'id_user'  => '165',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119096',
            'password' => bcrypt('J3D119096'),
            'id_user'  => '166',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119098',
            'password' => bcrypt('J3D119098'),
            'id_user'  => '167',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119099',
            'password' => bcrypt('J3D119099'),
            'id_user'  => '168',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119101',
            'password' => bcrypt('J3D119101'),
            'id_user'  => '169',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119104',
            'password' => bcrypt('J3D119104'),
            'id_user'  => '170',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119105',
            'password' => bcrypt('J3D119105'),
            'id_user'  => '171',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119108',
            'password' => bcrypt('J3D119108'),
            'id_user'  => '172',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119110',
            'password' => bcrypt('J3D119110'),
            'id_user'  => '173',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119111',
            'password' => bcrypt('J3D119111'),
            'id_user'  => '174',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119112',
            'password' => bcrypt('J3D119112'),
            'id_user'  => '175',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119113',
            'password' => bcrypt('J3D119113'),
            'id_user'  => '176',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119116',
            'password' => bcrypt('J3D119116'),
            'id_user'  => '177',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119118',
            'password' => bcrypt('J3D119118'),
            'id_user'  => '178',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119119',
            'password' => bcrypt('J3D119119'),
            'id_user'  => '179',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119121',
            'password' => bcrypt('J3D119121'),
            'id_user'  => '180',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119124',
            'password' => bcrypt('J3D119124'),
            'id_user'  => '181',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119125',
            'password' => bcrypt('J3D119125'),
            'id_user'  => '182',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119126',
            'password' => bcrypt('J3D119126'),
            'id_user'  => '183',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119127',
            'password' => bcrypt('J3D119127'),
            'id_user'  => '184',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119130',
            'password' => bcrypt('J3D119130'),
            'id_user'  => '185',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119131',
            'password' => bcrypt('J3D119131'),
            'id_user'  => '186',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119132',
            'password' => bcrypt('J3D119132'),
            'id_user'  => '187',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119133',
            'password' => bcrypt('J3D119133'),
            'id_user'  => '188',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119003',
            'password' => bcrypt('J3D119003'),
            'id_user'  => '189',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119006',
            'password' => bcrypt('J3D119006'),
            'id_user'  => '190',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119013',
            'password' => bcrypt('J3D119013'),
            'id_user'  => '191',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119018',
            'password' => bcrypt('J3D119018'),
            'id_user'  => '192',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119019',
            'password' => bcrypt('J3D119019'),
            'id_user'  => '193',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119020',
            'password' => bcrypt('J3D119020'),
            'id_user'  => '194',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119022',
            'password' => bcrypt('J3D119022'),
            'id_user'  => '195',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119025',
            'password' => bcrypt('J3D119025'),
            'id_user'  => '196',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119026',
            'password' => bcrypt('J3D119026'),
            'id_user'  => '197',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119029',
            'password' => bcrypt('J3D119029'),
            'id_user'  => '198',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119031',
            'password' => bcrypt('J3D119031'),
            'id_user'  => '199',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119043',
            'password' => bcrypt('J3D119043'),
            'id_user'  => '200',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119054',
            'password' => bcrypt('J3D119054'),
            'id_user'  => '201',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119057',
            'password' => bcrypt('J3D119057'),
            'id_user'  => '202',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119064',
            'password' => bcrypt('J3D119064'),
            'id_user'  => '203',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119070',
            'password' => bcrypt('J3D119070'),
            'id_user'  => '204',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119074',
            'password' => bcrypt('J3D119074'),
            'id_user'  => '205',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119078',
            'password' => bcrypt('J3D119078'),
            'id_user'  => '206',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119085',
            'password' => bcrypt('J3D119085'),
            'id_user'  => '207',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119097',
            'password' => bcrypt('J3D119097'),
            'id_user'  => '208',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119100',
            'password' => bcrypt('J3D119100'),
            'id_user'  => '209',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119106',
            'password' => bcrypt('J3D119106'),
            'id_user'  => '210',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119107',
            'password' => bcrypt('J3D119107'),
            'id_user'  => '211',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119109',
            'password' => bcrypt('J3D119109'),
            'id_user'  => '212',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119115',
            'password' => bcrypt('J3D119115'),
            'id_user'  => '213',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119128',
            'password' => bcrypt('J3D119128'),
            'id_user'  => '214',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D119134',
            'password' => bcrypt('J3D119134'),
            'id_user'  => '215',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219136',
            'password' => bcrypt('J3D219136'),
            'id_user'  => '216',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219138',
            'password' => bcrypt('J3D219138'),
            'id_user'  => '217',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219140',
            'password' => bcrypt('J3D219140'),
            'id_user'  => '218',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219141',
            'password' => bcrypt('J3D219141'),
            'id_user'  => '219',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219142',
            'password' => bcrypt('J3D219142'),
            'id_user'  => '220',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219143',
            'password' => bcrypt('J3D219143'),
            'id_user'  => '221',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219144',
            'password' => bcrypt('J3D219144'),
            'id_user'  => '222',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219146',
            'password' => bcrypt('J3D219146'),
            'id_user'  => '223',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219147',
            'password' => bcrypt('J3D219147'),
            'id_user'  => '224',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219148',
            'password' => bcrypt('J3D219148'),
            'id_user'  => '225',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219149',
            'password' => bcrypt('J3D219149'),
            'id_user'  => '226',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219150',
            'password' => bcrypt('J3D219150'),
            'id_user'  => '227',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219151',
            'password' => bcrypt('J3D219151'),
            'id_user'  => '228',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219152',
            'password' => bcrypt('J3D219152'),
            'id_user'  => '229',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219153',
            'password' => bcrypt('J3D219153'),
            'id_user'  => '230',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219154',
            'password' => bcrypt('J3D219154'),
            'id_user'  => '231',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219155',
            'password' => bcrypt('J3D219155'),
            'id_user'  => '232',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219156',
            'password' => bcrypt('J3D219156'),
            'id_user'  => '233',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219157',
            'password' => bcrypt('J3D219157'),
            'id_user'  => '234',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219158',
            'password' => bcrypt('J3D219158'),
            'id_user'  => '235',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219159',
            'password' => bcrypt('J3D219159'),
            'id_user'  => '236',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219160',
            'password' => bcrypt('J3D219160'),
            'id_user'  => '237',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219164',
            'password' => bcrypt('J3D219164'),
            'id_user'  => '238',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219166',
            'password' => bcrypt('J3D219166'),
            'id_user'  => '239',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219167',
            'password' => bcrypt('J3D219167'),
            'id_user'  => '240',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219168',
            'password' => bcrypt('J3D219168'),
            'id_user'  => '241',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219169',
            'password' => bcrypt('J3D219169'),
            'id_user'  => '242',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219170',
            'password' => bcrypt('J3D219170'),
            'id_user'  => '243',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219171',
            'password' => bcrypt('J3D219171'),
            'id_user'  => '244',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219172',
            'password' => bcrypt('J3D219172'),
            'id_user'  => '245',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219173',
            'password' => bcrypt('J3D219173'),
            'id_user'  => '246',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219174',
            'password' => bcrypt('J3D219174'),
            'id_user'  => '247',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219176',
            'password' => bcrypt('J3D219176'),
            'id_user'  => '248',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219178',
            'password' => bcrypt('J3D219178'),
            'id_user'  => '249',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219180',
            'password' => bcrypt('J3D219180'),
            'id_user'  => '250',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219181',
            'password' => bcrypt('J3D219181'),
            'id_user'  => '251',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219182',
            'password' => bcrypt('J3D219182'),
            'id_user'  => '252',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219183',
            'password' => bcrypt('J3D219183'),
            'id_user'  => '253',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219184',
            'password' => bcrypt('J3D219184'),
            'id_user'  => '254',
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'username' => 'J3D219185',
            'password' => bcrypt('J3D219185'),
            'id_user'  => '255',
        ]);

        $mahasiswa->assignRole('mahasiswa');
    }
}
