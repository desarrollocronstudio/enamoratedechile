<?php

class TipsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tips')->truncate();
        
		\DB::table('tips')->insert(array (
			0 => 
			array (
				'id' => 3,
				'name' => 'Wazaaaa',
				'city_name' => 'Maipú',
				'place_name' => 'Maipú, Santiago, Chile',
				'image' => '',
				'images' => '',
				'lat' => '-33.516667000000',
				'lng' => '-70.766667000000',
				'content' => 'elmsafk sa',
				'author_id' => 1,
				'type_id' => 1,
				'created_at' => '2014-07-25 03:16:37',
				'updated_at' => '2014-07-25 03:16:37',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 4,
				'name' => 'Don Floro',
				'city_name' => 'Arica',
				'place_name' => 'Benjamin Vicuña Mackenna 867, Arica, Chile',
				'image' => '',
				'images' => '',
				'lat' => '-18.479916900000',
				'lng' => '-70.310854900000',
				'content' => 'El mejor para comer en Arica!',
				'author_id' => 1,
				'type_id' => 2,
				'created_at' => '2014-07-25 03:22:13',
				'updated_at' => '2014-07-25 03:22:13',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 2,
				'name' => 'Elecktro Producciones',
				'city_name' => 'Santiago',
				'place_name' => 'Pedro de Valdivia 555, Santiago, Providencia, Chile',
				'image' => '6D7RVl9Y07MN.jpg',
				'images' => '',
				'lat' => '-33.428264700000',
				'lng' => '-70.610604800000',
				'content' => 'El mejor lugar pal carrete!',
				'author_id' => 1,
				'type_id' => 3,
				'created_at' => '2014-07-25 02:47:08',
				'updated_at' => '2014-07-25 02:47:08',
				'deleted_at' => NULL,
			),
		));
	}

}
