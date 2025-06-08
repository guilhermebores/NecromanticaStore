<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
{
    DB::table('products')->insert([
            [
                'name' => 'Capa de Vampiro',
                'description' => 'Capa preta com detalhes em vermelho, ideal para uma noite gótica.',
                'price' => 199.90,
                'image' => 'capa_vampiro.jpg',
            ],
            [
                'name' => 'Cristal Místico',
                'description' => 'Cristal negro encantado com propriedades misteriosas.',
                'price' => 89.90,
                'image' => 'cristal_mistico.jpg',
            ],
            [
                'name' => 'Anel de Ferro Sombrio',
                'description' => 'Anel de ferro com símbolos ocultos, ideal para iniciados no ocultismo.',
                'price' => 129.90,
                'image' => 'anel_ferro_sombrio.jpg',
            ],
            [
                'name' => 'Botas Góticas de Couro',
                'description' => 'Botas de couro negro, com tachas de metal, perfeitas para um visual rebelde.',
                'price' => 350.00,
                'image' => 'botas_goticas.jpg',
            ],
            [
                'name' => 'Choker de Veludo e Correntes',
                'description' => 'Choker de veludo preto com correntes prateadas, elegante e sombria.',
                'price' => 79.90,
                'image' => 'choker_veludo_corrente.jpg',
            ],
            [
                'name' => 'Jaqueta de Couro com Tachas',
                'description' => 'Jaqueta de couro com tachas de metal, estilo gótico punk.',
                'price' => 499.90,
                'image' => 'jaqueta_couro_tachas.jpg',
            ],
            [
                'name' => 'Vestido de Veludo Gótico',
                'description' => 'Vestido de veludo preto com detalhes em renda, para uma noite encantada.',
                'price' => 250.00,
                'image' => 'vestido_veludo.jpg',
            ],
            [
                'name' => 'Luvas de Couro Góticas',
                'description' => 'Luvas de couro com detalhes em renda, perfeitas para completar seu look gótico.',
                'price' => 99.90,
                'image' => 'luvas_couro.jpg',
            ],
            [
                'name' => 'Bolsa de Ombro com Correntes',
                'description' => 'Bolsa preta com correntes metálicas, para um estilo gótico chic.',
                'price' => 159.90,
                'image' => 'bolsa_ombro_corrente.jpg',
            ],
            [
                'name' => 'Cinto de Couro com Fivela de Ferro',
                'description' => 'Cinto de couro com fivela de ferro forjada, com um toque de rebeldia.',
                'price' => 79.90,
                'image' => 'cinto_couro_fivela.jpg',
            ],
        ]);
}

}
