<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $album = array(
            array('id' => '1', 'name' => 'Divinely Uninspired to a Hellish Extent', 'artist_id' => '3', 'estreno' => '2019', 'descripcion' => 'Divinely Uninspired to a Hellish Extent es el primer álbum de estudio del cantante y compositor británico Lewis Capaldi, lanzado el 17 de mayo de 2019 bajo el sello de Virgin EMI Records.', 'image' => 'https://images-na.ssl-images-amazon.com/images/I/61-K3qJWGYL._SL1200_.jpg', 'slug' => 'divinely-uninspired-to-a-hellish-extent', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '2', 'name' => 'Breach', 'artist_id' => '3', 'estreno' => '2018', 'descripcion' => 'Breach es la segunda obra extendida del cantautor escocés Lewis Capaldi. Fue lanzado como una descarga digital el 8 de noviembre de 2018. Incluye los singles "Tough", "Grace" y "Someone You Loved" y una demostración de "Something Borrowed".', 'image' => 'https://img.discogs.com/nWSTOU8JJHIlc8bh50DjikQQMRs=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-12854492-1544468151-9899.jpeg.jpg', 'slug' => 'breach', 'created_at' => NULL, 'updated_at' => NULL)
        );

        foreach ($album as $item) {
            DB::table('album')->insert([$item]);
        }
    }
}
