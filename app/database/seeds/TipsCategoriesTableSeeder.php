<?php

class TipsCategoriesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tips_categories')->truncate();
        
		\DB::table('tips_categories')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Alojamiento',
				'order' => 1,
				'description' => '',
                'images' => 'alojamiento-1.jpg,alojamiento-2.jpg'
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Comida',
				'order' => 2,
				'description' => '',
                'images' => 'comida-1.jpg,comida-2.jpg'
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'Compras',
				'order' => 3,
				'description' => '',
                'images' => 'compras-1.jpg,compras-2.jpg'
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Actividades',
				'order' => 4,
				'description' => '',
                'images' => 'actividades-1.jpg,actividades-2.jpg'
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'Vida Nocturna',
				'order' => 5,
				'description' => '',
                'images' => 'noche-1.jpg,noche-2.jpg'
			),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Atracciones',
                    'order' => 6,
                    'description' => '',
                    'images' => 'atracciones-1.jpg,atracciones-2.jpg'
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Datos prácticos',
                    'order' => 7,
                    'description' => '',
                    'images' => 'datos-practicos-1.jpg,datos-practicos-2.jpg'
                ),
		));
	}

}
