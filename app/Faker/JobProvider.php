<?php
namespace App\Faker;
use Faker\Provider\Base;

class JobProvider extends Base 
{
    protected static $names = [
        'Especialista na área de Mobile Marketing',
        'Formador de Trade Marketing',
        'Analista de SEO',
        'Gestor de mídias sociais',
        'Especialista em links patrocinados',
        'Professor de marketing digital',
        'Advogado especialista em direito eletrônico',
        'Especialista em combate à pirataria',
        'Advogado especialista em seguros e resseguros',
        'Especializado em entretenimento',
        'Engenheiro de segurança',
        'Arquiteto de dados',
        'Agente de Marketing Multinível',
        'Cientista de dados',
        'Engenheiro de rede de cloud computing',
        'Professor de cloud computing',
        'Profissional de computação em nuvens',
        'Professor computação em nuvens',
        'Desenvolvedor de aplicativos móveis',
        'Gerente de sustentabilidade',
        'Desenvolvedores de softwares',
        'Treinador Desenvolvimento de softwares',
        'Analista de Big Data',
        'Formador de Big Data',
        'Professor de Big Data',
        'Segurança da informação/Blockchain',
        'Especialistas em Experiência de Usuário/Cliente',
        'Profissional de Marketing Digital',
        'Gestor de inovação',
        'Gestor de inovação',
        'Especialista em E-commerce',
        'Creators/Influenciadores Digitais',
        'Assessor de creators',
        'Professores online',
        'Coach desportivo',
        'Coach de atividade física',
        'Engenheiro ambiental',
        'Gestor de ecorrelações',
        'Docente de ecorrelações',
        'Bioinformacionista',
        'Geneticista',
        'Engenheiro hospitalar',
        'Gestor de resíduos',
        'Formador de Gestão de resíduos',
        'Especialista em energias renováveis',
        'Desenvolvedor de veículos alternativos',
        'Desenvolvedor de dispositivos wearables',
        'Profissionais de saúde mental',
        'Gestor financeiro',
        'Coach financeiro',
        'Advogado Societário',
        'Advogado Tributário',
        'Perito forense digital',
        'Docente de perícia digital',
        'Arquiteto e Engenheiro 3D',
        'Formador de arquitectura 3D',
        'Professor de mandarim ',
        'Condutor de drones',
        'Formador de condução ligeiro Profissional',
    ];

    public function framework(): string
    {
        return static::randomElement(static::$names);
    }
}