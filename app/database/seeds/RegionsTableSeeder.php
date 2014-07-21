<?php

class RegionsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('regions')->truncate();
        
		\DB::table('regions')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'PRIMERA',
				'code' => 'I',
				'large_name' => 'REGIÓN DE TARAPACÁ',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'SEGUNDA',
				'code' => 'II',
				'large_name' => 'REGIÓN DE ANTOFAGASTA',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'TERCERA',
				'code' => 'III',
				'large_name' => 'REGIÓN DE ATACAMA',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'CUARTA',
				'code' => 'IV',
				'large_name' => 'REGIÓN DE COQUIMBO',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'QUINTA',
				'code' => 'V',
				'large_name' => 'REGIÓN DE VALPARAISO',
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'SEXTA',
				'code' => 'VI',
				'large_name' => 'REGIÓN DEL LIBERTADOR GENERAL BERNARDO O\'HIGGINS',
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'SÉPTIMA',
				'code' => 'VII',
				'large_name' => 'REGIÓN DEL MAULE',
			),
			7 => 
			array (
				'id' => 8,
				'name' => 'OCTAVA',
				'code' => 'VIII',
				'large_name' => 'REGIÓN DEL BÍO - BÍO',
			),
			8 => 
			array (
				'id' => 9,
				'name' => 'NOVENA',
				'code' => 'IX',
				'large_name' => 'REGIÓN DE LA ARAUCANÍA',
			),
			9 => 
			array (
				'id' => 10,
				'name' => 'DÉCIMA',
				'code' => 'X',
				'large_name' => 'REGIÓN DE LOS LAGOS',
			),
			10 => 
			array (
				'id' => 11,
				'name' => 'DECIMOPRIMERA',
				'code' => 'XI',
				'large_name' => 'REGIÓN AYSÉN DEL GENERAL CARLOS IBÁÑEZ DEL CAMPO',
			),
			11 => 
			array (
				'id' => 12,
				'name' => 'DECIMOSEGUNDA',
				'code' => 'XII',
				'large_name' => 'REGIÓN DE MAGALLANES Y LA ANTÁRTICA CHILENA ',
			),
			12 => 
			array (
				'id' => 13,
				'name' => 'METROPOLITANA',
				'code' => 'XIII',
				'large_name' => 'REGIÓN METROPOLITANA',
			),
			13 => 
			array (
				'id' => 14,
				'name' => 'DECIMOCUARTA',
				'code' => 'XIV',
				'large_name' => 'REGION DE LOS RÍOS',
			),
			14 => 
			array (
				'id' => 15,
				'name' => 'DECIMOQUINTA',
				'code' => 'XV',
				'large_name' => 'REGIÓN DE ARICA Y PARINACOTA',
			),
		));
	}

}
