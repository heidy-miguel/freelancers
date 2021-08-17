<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('skills')->insert([
            ['name' => 'Desenvolvimento de negócios'],
            ['name' => 'Inteligência de negócios (BI)'],
            ['name' => 'Economia'],
            ['name' => 'Análise de negócio'],
            ['name' => 'Administração'],
            ['name' => 'Gestão de negócios'],
            ['name' => 'Computação em nuvem'],
            ['name' => 'Apresentação de dados'],
            ['name' => 'Gerenciamento de conteúdo'],
            ['name' => 'Suporte técnico'],
            ['name' => 'UI / UX'],
            ['name' => 'Engenharia de software'],
            ['name' => 'Desenvolvimento móvel'],
            ['name' => 'Middleware e software de integração'],
            ['name' => 'Blockchain'],
            ['name' => 'Computação científica'],
            ['name' => 'Gerenciamento de Projetos'],
            ['name' => 'Planejamento estratégico'],
            ['name' => 'Coaching'],
            ['name' => 'Negociação'],
            ['name' => 'Gestão de relacionamento'],
            ['name' => 'SEO / SEM'],
            ['name' => 'Marketing de conteúdo'],
            ['name' => 'Marketing on-line'],
            ['name' => 'Pesquisa de mercado'],
            ['name' => 'Mídia social'],
            ['name' => 'Planejamento de mídia'],
            ['name' => 'Marketing de canal'],
            ['name' => 'Marketing afiliado'],
            ['name' => 'Análise de dados'],
            ['name' => 'Pensamento crítico'],
            ['name' => 'Solução de problemas'],
            ['name' => 'Pesquisar'],
            ['name' => 'Consultando'],
            ['name' => 'Escuta activa'],
            ['name' => 'Escrita'],
            ['name' => 'Comunicação não verbal'],
            ['name' => 'Apresentação'],
            ['name' => 'boletins informativos'],
            ['name' => 'Editando'],
            ['name' => 'Criatividade'],
            ['name' => 'Gestão de Pessoas'],
            ['name' => 'Gerenciamento de tempo'],
            ['name' => 'Persuasão'],
            ['name' => 'Inteligência Emocional (EQ)'],
            ['name' => 'Tradução'],
            ['name' => 'Produção de vídeo'],
            ['name' => 'Comunicações corporativas'],
            ['name' => 'Desenho industrial'],
            ['name' => 'Colaboração'],
            ['name' => 'Adaptabilidade'],
            ['name' => 'Raciocínio analítico'],
            ['name' => 'Liderança de vendas'],
            ['name' => 'Jornalismo'],
            ['name' => 'Estratégias competitivas'],
        ]);
    }
}