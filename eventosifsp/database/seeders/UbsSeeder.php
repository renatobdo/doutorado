<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ubs;

class UbsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubs = [
            [
                'nome' => 'UBS Alvarenga',
                'endereco' => 'Estrada dos Alvarengas, 1.199',
                'bairro' => 'Alvarenga',
                'email' => 'ubs.alvarenga@saobernardo.sp.gov.br',
                'telefone' => '43559-9060',
            ],
            [
                'nome' => 'UBS Alves Dias',
                'endereco' => 'Rua Alexandre Bonicio, 113',
                'bairro' => 'Alves Dias',
                'email' => 'ubs.alvesdias@saobernardo.sp.gov.br',
                'telefone' => '4351-3553',
            ],
            [
                'nome' => 'UBS Areião',
                'endereco' => 'Passagem Ayrton Senna, 55',
                'bairro' => 'Montanhão',
                'email' => 'ubs.areiao@saobernardo.sp.gov.br',
                'telefone' => '4103-9430',
            ],
            [
                'nome' => 'UBS Baeta Neves',
                'endereco' => 'Rua Giacinto Tognato, 1100',
                'bairro' => 'Baeta Neves',
                'email' => 'ubs.baetaneves@saobernardo.sp.gov.br',
                'telefone' => '4330-4773 / 4332-2961',
            ],
            [
                'nome' => 'UBS Batistini',
                'endereco' => 'Rua Manoel Carneiro, 120',
                'bairro' => 'Batistini',
                'email' => 'ubs.batistini@saobernardo.sp.gov.br',
                'telefone' => '4358-1644',
            ],
            [
                'nome' => 'UBS Caminho do Mar',
                'endereco' => 'Rua Aura, 79',
                'bairro' => 'Rudge Ramos',
                'email' => 'ubs.caminhodomar@saobernardo.sp.gov.br',
                'telefone' => '4362-2739',
            ],
            [
                'nome' => 'UBS Demarchi',
                'endereco' => 'Rua Albino Demarchi, 131',
                'bairro' => 'Demarchi',
                'email' => 'ubs.demarchi@saobernardo.sp.gov.br',
                'telefone' => '4347-8051 / 4347-7058',
            ],
            [
                'nome' => 'UBS Farina',
                'endereco' => 'Rua Maria Joséfa Mendes, 15',
                'bairro' => 'Jardim Farina',
                'email' => 'ubs.farina@saobernardo.sp.gov.br',
                'telefone' => '4125-4534 / 4330-1875',
            ],
            [
                'nome' => 'UBS Ferrazópolis',
                'endereco' => 'Av. Fernando Ferrari, 449',
                'bairro' => 'Ferrazópolis',
                'email' => 'ubs.ferrazopolis@saobernardo.sp.gov.br',
                'telefone' => '4338-3002 / 4127-1990',
            ],
            [
                'nome' => 'UBS Finco',
                'endereco' => 'Rua Fortunato Benevenuto Finco, 151',
                'bairro' => 'Finco',
                'email' => 'ubs.finco@saobernardo.sp.gov.br',
                'telefone' => '4354-9118 / 4354-7317',
            ],
            [
                'nome' => 'UBS Ipê',
                'endereco' => 'Rua Lago da Mangueira, 329',
                'bairro' => 'Dos Casa',
                'email' => 'ubs.ipe@saobernardo.sp.gov.br',
                'telefone' => '4342-3199',
            ],
            [
                'nome' => 'UBS Jardim das Oliveiras',
                'endereco' => 'Estrada da Cama Patente, 1.702',
                'bairro' => 'Alvarenga',
                'email' => 'ubs.oliveiras@saobernardo.sp.gov.br',
                'telefone' => '4101-7163',
            ],
            [
                'nome' => 'UBS Jordanópolis',
                'endereco' => 'Rua Oswaldo Cruz, 120',
                'bairro' => 'Vila Jordanópolis',
                'email' => 'ubs.jordanopolis@saobernardo.sp.gov.br',
                'telefone' => '4178-9949',
            ],
            [
                'nome' => 'UBS Leblon',
                'endereco' => 'Rua Abramo Luchesi, 5',
                'bairro' => 'Leblon',
                'email' => 'ubs.leblon@saobernardo.sp.gov.br',
                'telefone' => '4127-5406 / 2363-3066 / 2363-3065',
            ],
            [
                'nome' => 'UBS Montanhão',
                'endereco' => 'Estrada do Montanhão, 413',
                'bairro' => 'Montanhão',
                'email' => 'ubs.montanhao@saobernardo.sp.gov.br',
                'telefone' => '4335-7969',
            ],
            [
                'nome' => 'UBS Nazareth',
                'endereco' => 'Rua João XXIII, 380',
                'bairro' => 'Nazareth',
                'email' => 'ubs.nazareth@saobernardo.sp.gov.br',
                'telefone' => '4343-4166',
            ],
            [
                'nome' => 'UBS Orquideas',
                'endereco' => 'Estrada Poney Clube, 1.400',
                'bairro' => 'Alvarenga',
                'email' => 'ubs.orquideas@saobernardo.sp.gov.br',
                'telefone' => '4342-6224 / 4358-1617',
            ],
            [
                'nome' => 'UBS Parque São Bernardo',
                'endereco' => 'Rua dos Vianas, 3570',
                'bairro' => 'Parque São Bernardo',
                'email' => 'ubs.pqsbernardo@saobernardo.sp.gov.br',
                'telefone' => '4121-5034 / 4331-1418',
            ],
            [
                'nome' => 'UBS Pauliceia',
                'endereco' => 'Rua Miragaia, 834',
                'bairro' => 'Pauliceia',
                'email' => 'ubs.pauliceia@saobernardo.sp.gov.br',
                'telefone' => '4361-6959',
            ],
            [
                'nome' => 'UBS Planalto',
                'endereco' => 'Rua Oragnof, 480',
                'bairro' => 'Vila Júpiter',
                'email' => 'ubs.planalto@saobernardo.sp.gov.br',
                'telefone' => '4341-4347',
            ],
            [
                'nome' => 'UBS Represa',
                'endereco' => 'Rua Irati, 10',
                'bairro' => 'Jd. Represa',
                'email' => 'ubs.represa@saobernardo.sp.gov.br',
                'telefone' => '4358-5718',
            ],
            [
                'nome' => 'UBS Riacho Grande',
                'endereco' => 'Rua Santa Maria, 20',
                'bairro' => 'Parque Rio Grande',
                'email' => 'ubs.riachogrande@saobernardo.sp.gov.br',
                'telefone' => '4354-0321',
            ],
            [
                'nome' => 'UBS Rudge Ramos',
                'endereco' => 'Rua Angela Tomé, 246',
                'bairro' => 'Rudge Ramos',
                'email' => 'ubs.rudgeramos@saobernardo.sp.gov.br',
                'telefone' => '4177-4103 / 4367-4194',
            ],
            [
                'nome' => 'UBS Santa Cruz',
                'endereco' => 'Rua Hugo Vieira Pinto, 423',
                'bairro' => 'Santa Cruz',
                'email' => 'ubs.santacruz@saobernardo.sp.gov.br',
                'telefone' => '4357-4826',
            ],
            [
                'nome' => 'UBS Santa Terezinha',
                'endereco' => 'Rua Dois de Outubro, 175',
                'bairro' => 'Santa Terezinha',
                'email' => 'ubs.santaterezinha@saobernardo.sp.gov.br',
                'telefone' => '4335-1788',
            ],
            [
                'nome' => 'UBS São Pedro',
                'endereco' => 'Rua da Comunidade, 100',
                'bairro' => 'Montanhão',
                'email' => 'ubs.vilasaopedro@saobernardo.sp.gov.br',
                'telefone' => '4338-3009',
            ],
            [
                'nome' => 'UBS Selecta',
                'endereco' => 'Rua Oswaldo Stuchi, s/nº',
                'bairro' => 'Pq. Selecta',
                'email' => 'ubs.pqselecta@saobernardo.sp.gov.br',
                'telefone' => '4127-2518',
            ],
            [
                'nome' => 'UBS Silvina',
                'endereco' => 'Av. Marquês de Barbacena, 85',
                'bairro' => 'Silvina',
                'email' => 'ubs.silvina@saobernardo.sp.gov.br',
                'telefone' => '4345-3514',
            ],
            [
                'nome' => 'UBS Taboão',
                'endereco' => 'Av. do Taboão, 4281',
                'bairro' => 'Taboão',
                'email' => 'ubs.taboao@saobernardo.sp.gov.br',
                'telefone' => '4173-2390',
            ],
            [
                'nome' => 'UBS União',
                'endereco' => 'Rua dos Industriários, 17',
                'bairro' => 'Alvarenga',
                'email' => 'ubs.uniao@saobernardo.sp.gov.br',
                'telefone' => '4173-1062 / 4358-1621',
            ],
            [
                'nome' => 'UBS Vila Dayse',
                'endereco' => 'Rua Vicente de Carvalho, 255',
                'bairro' => 'Parque São Diogo',
                'email' => 'ubs.viladayse@saobernardo.sp.gov.br',
                'telefone' => '4121-2318',
            ],
            [
                'nome' => 'UBS Vila Euclides',
                'endereco' => 'Rua Anunciata Gobbi, 165',
                'bairro' => 'Vila Euclides',
                'email' => 'ubs.vilaeuclides@saobernardo.sp.gov.br',
                'telefone' => '4121-3190',
            ],
            [
                'nome' => 'UBS Vila Marchi',
                'endereco' => 'Rua Nestor Moreira, 480',
                'bairro' => 'Assunção',
                'email' => 'ubs.vilamarchi@saobernardo.sp.gov.br',
                'telefone' => '4351-5534 / 4109-4791',
            ],
            [
                'nome' => 'UBS Vila Rosa',
                'endereco' => 'Av. Rosa Aizemberg, 613',
                'bairro' => 'Independência',
                'email' => 'ubs.vilarosa@saobernardo.sp.gov.br',
                'telefone' => '4343-7727',
            ],
        ];
        foreach ($ubs as $ub) {
            Ubs::create($ub);
        }
    }
}
