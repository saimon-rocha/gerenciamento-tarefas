<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriasTableSeeder extends Seeder
{
    public function run()
    {
        Materia::create([
            'titulo' => 'A incrível diversidade da Amazônia',
            'descricao' => 'Explore a riqueza da fauna e flora da maior floresta tropical do mundo.',
            'imagem' => 'img/Xu9zBSWtZxENM1V8C8hAEEzlAS8kIKYeL8A65AqD.jpg',
            'data_de_publicacao' => now(),
            'texto_completo' => 'Texto completo sobre a Amazônia.',
        ]);

        Materia::create([
            'titulo' => 'Os mistérios do oceano profundo',
            'descricao' => 'Descubra os segredos das profundezas do oceano e suas criaturas fascinantes.',
            'imagem' => 'img/dUewHbDo56hP62oXLyIXkFJPHjEkYQigx7t8Pq5R.jpg',
            'data_de_publicacao' => now(),
            'texto_completo' => 'Texto completo sobre o oceano profundo.',
        ]);

        Materia::create([
            'titulo' => 'Os incríveis fenômenos naturais do mundo',
            'descricao' => 'Conheça os fenômenos naturais mais espetaculares e impressionantes do planeta.',
            'imagem' => 'img/QsVOffBoqgKjle10btwDUfBDB4ww6qRSMVpDkxq9.jpg',
            'data_de_publicacao' => now(),
            'texto_completo' => 'Texto completo sobre os fenômenos naturais.',
        ]);

        Materia::create([
            'titulo' => 'A beleza das auroras boreais',
            'descricao' => 'Explore as luzes dançantes do céu ártico e sua beleza única.',
            'imagem' => 'img/vbNGuZgCxZStTTWoosY9TKrH6klIW33PQ5vV6t2j.jpg',
            'data_de_publicacao' => now(),
            'texto_completo' => 'Texto completo sobre as auroras boreais.',
        ]);

        Materia::create([
            'titulo' => 'Os segredos da selva africana',
            'descricao' => 'Adentre na densa vegetação da savana africana e conheça suas criaturas majestosas.',
            'imagem' => 'img/Xd0TKFbaxf4XWTfZYe6HxAmw9DP3d0HMpdHfyLrY.jpg',
            'data_de_publicacao' => now(),
            'texto_completo' => 'Texto completo sobre a selva africana.',
        ]);
    }
}