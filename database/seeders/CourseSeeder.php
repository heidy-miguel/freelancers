<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $courses = array('técnica de expressão oral e escrita ', 'comunicação institucional',
            'português jurídico', 'português comercial'); 
        foreach($courses as $course){
            DB::table('courses')->insert([
                'name' => $course,
                'category_id' => 1, // português
                'created_at' => now()
            ]);
        }

        $courses = array('contabilidade sénior', 'contabilidade júnior',
            'fiscalidade', 'auditoria financeira', 'gestão empresarial', 'empreendedorismo',
            'novo regime IVA em angola', 'planeamento estratégico'); 
        foreach($courses as $course){
            DB::table('courses')->insert([
                'name' => $course,
                'category_id' => 2, // gestão
                'created_at' => now()
            ]);
        }

        $courses = array('gestão pública nível b', 'contratação pública',
            'direito do trabalho', 'direito comercial', 'prevenção e controlo interno'); 
        foreach($courses as $course){
            DB::table('courses')->insert([
                'name' => $course,
                'category_id' => 3, // direito
                'created_at' => now()
            ]);
        }

        $courses = array('produtos bancários e meios de pagamentos', 'gestão e análises do crédito',
            'financiamento e crédito bancário', 'obrigações e títulos do tesouro', 'basileia II',
            'recuperação do crédito', 'gestão do risco de inflação'); 
        foreach($courses as $course){
            DB::table('courses')->insert([
                'name' => $course,
                'category_id' => 4, // banca
                'created_at' => now()
            ]);
        }
    }
}
