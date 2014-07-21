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
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Comida',
				'order' => 2,
				'description' => '',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'Carretes',
				'order' => 3,
				'description' => '',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Qué hacer',
				'order' => 4,
				'description' => '',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'Datos prácticos',
				'order' => 5,
				'description' => '',
			),
		));
	}

}
