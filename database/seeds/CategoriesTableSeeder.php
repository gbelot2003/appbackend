<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            0 =>
            array(
                'id' => '1',
                'name' => 'Servicios',
                'description' => 'Ab quo voluptas porro laudantium possimus fuga. Quia omnis perspiciatis nemo qui mollitia exercitationem culpa. Quas voluptate quia qui fugiat suscipit.',
                'image_url' => 'https://neetwork.com/wp-content/uploads/2019/10/marketing-de-servicios.jpg',
                'created_at' => '2020-06-14 19:15:04',
                'updated_at' => '2020-06-14 19:15:04',
            ),
            1 =>
            array(
                'id' => '2',
                'name' => 'Higiene',
                'description' => 'Exercitationem atque ad qui et. Quaerat natus ab consequatur voluptatibus earum ea expedita vel. Omnis repudiandae qui nihil vitae voluptas et minus.',
                'image_url' => 'https://estaticos.elperiodico.com/resources/jpg/9/8/una-buena-higiene-las-manos-1583867980489.jpg',
                'created_at' => '2020-06-14 19:15:04',
                'updated_at' => '2020-06-14 19:15:04',
            ),
            2 =>
            array(
                'id' => '3',
                'name' => 'Electronicos',
                'description' => 'Ad ipsam sed in voluptatem corrupti ut. Quasi quis minima numquam occaecati atque eveniet.',
                'image_url' => 'https://img.freepik.com/foto-gratis/primer-plano-placa-circuito-electronico-cpu-microchip-componentes-electronicos-fondo_1387-819.jpg?size=626&ext=jpg',
                'created_at' => '2020-06-14 19:15:04',
                'updated_at' => '2020-06-14 19:15:04',
            ),
            3 =>
            array(
                'id' => '4',
                'name' => 'Comidas',
                'description' => 'Vel quia rem tenetur aut. Quos voluptatem quia cupiditate magni beatae et.',
                'image_url' => 'https://live.mrf.io/statics/i/ps/www.cocinacaserayfacil.net/wp-content/uploads/2018/09/Comidas-faciles-rapidas-y-ricas-de-hacer.jpg?width=1200&enable=upscale',
                'created_at' => '2020-06-14 19:15:04',
                'updated_at' => '2020-06-14 19:15:04',
            ),
            4 =>
            array(
                'id' => '5',
                'name' => 'Miselaneos',
                'description' => 'Et corrupti optio non quas. Esse suscipit ut maiores quidem. Deserunt voluptatem itaque quo veritatis excepturi dolor ipsa occaecati. Velit repellendus aut sed porro quia quaerat adipisci enim.',
                'image_url' => 'https://www.estrategiaynegocios.net/csp/mediapool/sites/dt.common.streams.StreamServer.cls?STREAMOID=VL9IMsGzei4SDRhCUicnWc$daE2N3K4ZzOUsqbU5sYswg3W0K9PPN0JG0WM$8Lco6FB40xiOfUoExWL3M40tfzssyZqpeG_J0TFo7ZhRaDiHC9oxmioMlYVJD0A$3RbIiibgT65kY_CSDiCiUzvHvODrHApbd6ry6YGl5GGOZrs-&CONTENTTYPE=image/jpeg',
                'created_at' => '2020-06-14 19:15:04',
                'updated_at' => '2020-06-14 19:15:04',
            ),
        ));
    }
}
