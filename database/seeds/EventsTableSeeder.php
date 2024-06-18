<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = array(
            array('id' => '1', 'name' => 'Lollapalooza', 'artist_id' => '3', 'description' => 'en Lollapalooza Argentina', 'texto' => 'Lollapalooza​ es un festival musical de los Estados Unidos que originalmente ofrecía bandas de rock alternativo, indie y punk rock; también hay actuaciones cómicas y de danza. Concebido en 1991 por Perry Farrell, cantante de Jane\'s Addiction, Lollapalooza se realizó anualmente hasta 1997 y fue revivido en 2003.', 'slug' => 'lewiscapaldi-lollapalooza', 'fecha' => '2020-05-24', 'image' => 'https://www.nacionrock.com/wp-content/uploads/lollapalooza.gif.png', 'image2' => NULL, 'image3' => NULL, 'image4' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '2', 'name' => 'Coachella', 'artist_id' => '3', 'description' => 'en el Festival de Música y Artes de Coachella Valley', 'texto' => 'El Festival de Música y Artes de Coachella Valley es un gran festival de música que se desarrolla durante tres días en la última semana del mes de abril y tiene lugar en Indio, California, Estados Unidos.', 'slug' => 'lewiscapaldi-coachella', 'fecha' => '2020-05-24', 'image' => 'https://theblondeandthebrunette.com/wp-content/uploads/2017/04/festivalparties-header.jpg', 'image2' => NULL, 'image3' => NULL, 'image4' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '3', 'name' => 'Cocacola Music Experience', 'artist_id' => '3', 'description' => 'en Cocacola Music Experience', 'texto' => 'La novena edición de Coca-Cola Music Experience puso el listón por las nubes, ¡nos flipó tantísimo! Disfrutamos a saco, nos movimos con cada temazo y lo mejor de todo: pudimos disfrutarlo durante dos días con todos los #CCMELovers.¿Qué si nos van los retazos? ¡Lo tenemos claro! Y este año la vaina va de esto: ¡una décima edición de locura, ritmazo y mucho bailoteo del bueno! Además, se nos va a ir la cabeza muchísimo con todos los sorpresones que os tenemos preparados, ¡van a ser cremita de la buena!Así que, amigas y amigos, aquí llega la fecha más esperada de todos los tiempos: 18 y 19 de septiembre en el recinto la Caja Mágica de Madrid. ¡Marcadlo a fuego en vuestros calendarios! Lo que va a pasar no va a tener nombre. Bueno sí, se llamará CCME 2020 y va a ser lo máximo. Preparaos para bajar hasta el suelo, bailar durante dos días de principio a fin y gozar con vuestros amigos del que será, estamos seguros, el festivalazo de vuestras vidas.', 'slug' => 'lewiscapaldi-cocacola', 'fecha' => '2020-05-24', 'image' => 'https://www.cocacola.es/content/dam/GO/CokeZone/Spain/CCME/20200305_Mockup_Cartel_Ciego.jpg', 'image2' => NULL, 'image3' => NULL, 'image4' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '4', 'name' => 'Festival', 'artist_id' => '7', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut imperdiet ipsum, at vulputate nibh.', 'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut imperdiet ipsum, at vulputate nibh. Phasellus semper enim metus, sed ullamcorper quam blandit non. Pellentesque nec laoreet quam, non euismod magna. Morbi mauris dui, posuere at imperdiet eget, ullamcorper non massa. Aenean eu purus ullamcorper tellus sollicitudin volutpat quis sit amet arcu. Nunc dapibus malesuada purus. Pellentesque suscipit luctus lacus a pulvinar. In gravida lacus mattis nulla tempor, venenatis lacinia ex efficitur. Cras elit elit, semper ac diam in, malesuada imperdiet arcu.', 'slug' => 'festival', 'fecha' => '2020-05-24', 'image' => 'https://www.mastersofhardcore.com/wp-content/uploads/2019/07/Schermafbeelding-2019-07-20-om-22.15.52-1280x853.png', 'image2' => NULL, 'image3' => NULL, 'image4' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '5', 'name' => 'Di Pepo', 'artist_id' => '5', 'description' => 'Mauris et risus non eros maximus tincidunt.', 'texto' => 'Mauris et risus non eros maximus tincidunt. Aenean hendrerit arcu tellus, dapibus sollicitudin eros commodo a. Pellentesque turpis sem, posuere eu tellus at, pellentesque viverra dolor. Nunc elementum sem eget varius rutrum. Quisque consectetur augue quis est feugiat, sed molestie orci volutpat. Morbi eget felis sollicitudin, iaculis eros ut, fermentum ex. Ut tempor diam et est molestie posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'slug' => 'di-pepo', 'fecha' => '2020-05-24', 'image' => 'https://estaticos.elperiodico.com/resources/jpg/7/2/preparativos-croisette-edicion-del-festival-cannes-1557764672927.jpg', 'image2' => NULL, 'image3' => NULL, 'image4' => NULL, 'created_at' => NULL, 'updated_at' => NULL)
        );

        foreach ($events as $event) {
            DB::table('event')->insert([$event]);
        }
    }
}
