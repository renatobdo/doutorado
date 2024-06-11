<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('catalogo')
        ->where('id', 1) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'Arbovirose é um termo utilizado para descrever doenças virais que são transmitidas por mosquitos. Exemplos de arboviroses incluem a dengue, febre amarela, Zika, chikungunya e encefalites transmitidas por mosquitos.',
            'tipo_de_metadado' => 1,
        ]);
        DB::table('catalogo')
        ->where('id', 2) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'Aedes aegypti é o nome científico de um mosquito que é conhecido por ser um vetor de várias doenças infecciosas, mais notavelmente o vírus da dengue, zika e chikungunya. Ele é originário da África, mas se espalhou para muitas partes do mundo, especialmente em regiões tropicais e subtropicais, onde as condições climáticas favorecem sua reprodução. O Aedes aegypti é reconhecido por suas listras brancas e pretas nas pernas e no corpo, e é mais ativo durante o amanhecer e o entardecer. Sua capacidade de transmitir doenças o torna um alvo importante para medidas de controle e prevenção em áreas onde essas doenças são endêmicas',
            'tipo_de_metadado' => 1,
        ]);
        DB::table('catalogo')
        ->where('id', 3) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'O vírus da dengue é um flavivírus transmitido principalmente pela picada do mosquito Aedes aegypti, embora também possa ser transmitido pelo Aedes albopictus. A dengue é uma doença viral aguda que pode causar uma variedade de sintomas, desde febre leve até formas graves que podem levar à morte.',
            'tipo_de_metadado' => 1,
        ]);
        DB::table('catalogo')
        ->where('id', 4) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'O vírus da Zika é um flavivírus transmitido principalmente pela picada de mosquitos infectados do gênero Aedes, especialmente o Aedes aegypti. O vírus recebeu esse nome devido à floresta Zika, em Uganda, onde foi isolado pela primeira vez em 1947. Desde então, casos de infecção por Zika têm sido relatados em várias partes do mundo.',
            'tipo_de_metadado' => 1,
        ]);
        DB::table('catalogo')
        ->where('id', 5) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'O vírus chikungunya é um alphavirus transmitido principalmente pela picada de mosquitos infectados do gênero Aedes, especialmente o Aedes aegypti e o Aedes albopictus. O vírus recebeu seu nome da língua Makonde, falada em algumas partes da Tanzânia e do sudeste da África, e significa "aqueles que se dobram", referindo-se à postura encurvada adotada por pacientes afetados pela doença devido à dor articular intensa.',
            'tipo_de_metadado' => 1,
        ]);
        DB::table('catalogo')
        ->where('id', 6) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'A febre amarela é uma doença viral aguda causada pelo vírus da febre amarela, que pertence à família Flaviviridae. Ela é transmitida principalmente pela picada de mosquitos infectados do gênero Aedes, especialmente o Aedes aegypti na área urbana e o Haemagogus e Sabethes na área silvestre.

            Existem dois ciclos de transmissão da febre amarela: urbano e silvestre. No ciclo urbano, o vírus é transmitido entre seres humanos através da picada de mosquitos Aedes aegypti infectados. No ciclo silvestre, os mosquitos Haemagogus e Sabethes infectam principalmente macacos selvagens, e os seres humanos podem ser infectados quando entram em áreas florestais e são picados por mosquitos infectados.',
            'tipo_de_metadado' => 1,
        ]);
        DB::table('catalogo')
        ->where('id', 8) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'Uma epidemia de dengue ocorre quando há um aumento significativo no número de casos da doença em uma determinada área geográfica em um período de tempo específico. A dengue é uma doença viral transmitida principalmente pela picada de mosquitos infectados do gênero Aedes, especialmente o Aedes aegypti.',
            'tipo_de_metadado' => 5,
        ]);
        DB::table('catalogo')
        ->where('id', 9) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'Endemia se refere à presença constante ou prevalência regular de uma doença em uma determinada área geográfica ou população durante um longo período de tempo. ',
            'tipo_de_metadado' => 5,
        ]);
        DB::table('catalogo')
        ->where('id', 10) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'o termo vetor se refere a um organismo vivo, neste caso, um mosquito, que é capaz de transmitir o vírus causador da doença de uma pessoa infectada para uma pessoa saudável. No caso da dengue, o vetor principal é o mosquito Aedes aegypti, embora o Aedes albopictus também possa desempenhar um papel na transmissão.',
            'tipo_de_metadado' => 1,
        ]);
        DB::table('catalogo')
        ->where('id', 11) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'A vacina da dengue é uma vacina desenvolvida para prevenir a infecção pelo vírus da dengue. Ela é projetada para estimular uma resposta imunológica no corpo humano, proporcionando proteção contra a doença. A vacinação é uma ferramenta importante no controle da dengue, especialmente em áreas onde a doença é endêmica.',
            'tipo_de_metadado' => 5,
        ]);
        DB::table('catalogo')
        ->where('id', 12) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'Refere-se à empresa ou instituição responsável pelo desenvolvimento, produção e distribuição de uma vacina específica contra o vírus da dengue',
            'tipo_de_metadado' => 5,
        ]);
        DB::table('catalogo')
        ->where('id', 13) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => ' Refere-se à quantidade de uma vacina específica que é administrada a um indivíduo como parte de um esquema de imunização. Cada vacina tem um protocolo específico de dosagem, que pode variar dependendo da vacina, do tipo de vírus ou bactéria alvo e da faixa etária do paciente',
            'tipo_de_metadado' => 5,
        ]);
        DB::table('catalogo')
        ->where('id', 14) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'Período de tempo durante o qual uma vacina é considerada eficaz e segura para uso. Após esse período, a vacina pode perder sua eficácia ou estabilidade e não fornecer mais a proteção desejada contra a doença-alvo.',
            'tipo_de_metadado' => 5,
        ]);
        DB::table('catalogo')
        ->where('id', 15) // ID do registro que você deseja atualizar
        ->update([
            'descricao' => 'Refere-se à proporção da população alvo que recebeu uma ou mais doses de uma vacina específica em um determinado período de tempo. É uma medida importante para avaliar o sucesso de um programa de vacinação e sua capacidade de proteger a população contra doenças evitáveis por vacinação.',
            'tipo_de_metadado' => 5,
        ]);
       
    }
}
