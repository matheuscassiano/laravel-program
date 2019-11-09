<?php

use Illuminate\Database\Seeder;
use App\User;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'id' => '1',
            'type' => 'admin'
        ]);

        DB::table('competencias')->insert([
            'competencia_id' => '1',
            'competencia' => 'Banco de Dados',
            'competencia_2' => 'Desenvolvimento font-end',
            'competencia_3' => 'DevOps'
        ]);

        DB::table('users')->insert([
            'user_id' => '1',
            'type_id' => '1',
            'competencias' => 'Teste 01, Teste 02, Teste 03',
            'name' => 'Matheus',
            'cpf' => '12198748410',
            'phone' => '82987391037',
            'status' => '1',
            'email' => 'Matheus',
            'user' => 'admin',
            'pass' => md5('nimda'),
            'date_time' => '2019-01-19 03:14:07'
        ]);
    }
}
