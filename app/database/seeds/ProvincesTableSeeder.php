<?php

class ProvincesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('provinces')->truncate();
        
		\DB::table('provinces')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'ARICA',
				'region_id' => 15,
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'PARINACOTA',
				'region_id' => 15,
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'IQUIQUE',
				'region_id' => 1,
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'TOCOPILLA',
				'region_id' => 2,
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'EL LOA',
				'region_id' => 2,
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'ANTOFAGASTA',
				'region_id' => 2,
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'CHAÑARAL',
				'region_id' => 3,
			),
			7 => 
			array (
				'id' => 8,
				'name' => 'COPIAPÓ',
				'region_id' => 3,
			),
			8 => 
			array (
				'id' => 9,
				'name' => 'HUASCO',
				'region_id' => 3,
			),
			9 => 
			array (
				'id' => 10,
				'name' => 'ELQUI',
				'region_id' => 4,
			),
			10 => 
			array (
				'id' => 11,
				'name' => 'LIMARÍ',
				'region_id' => 4,
			),
			11 => 
			array (
				'id' => 12,
				'name' => 'CHOAPA',
				'region_id' => 4,
			),
			12 => 
			array (
				'id' => 13,
				'name' => 'VALPARAÍSO',
				'region_id' => 5,
			),
			13 => 
			array (
				'id' => 14,
				'name' => 'PETORCA',
				'region_id' => 5,
			),
			14 => 
			array (
				'id' => 15,
				'name' => 'LOS ANDES',
				'region_id' => 5,
			),
			15 => 
			array (
				'id' => 16,
				'name' => 'SAN FELIPE DE ACONCAGUA',
				'region_id' => 5,
			),
			16 => 
			array (
				'id' => 17,
				'name' => 'QUILLOTA',
				'region_id' => 5,
			),
			17 => 
			array (
				'id' => 18,
				'name' => 'SAN ANTONIO',
				'region_id' => 5,
			),
			18 => 
			array (
				'id' => 19,
				'name' => 'ISLA DE PASCUA',
				'region_id' => 5,
			),
			19 => 
			array (
				'id' => 20,
				'name' => 'CACHAPOAL',
				'region_id' => 6,
			),
			20 => 
			array (
				'id' => 21,
				'name' => 'COLCHAHUA',
				'region_id' => 6,
			),
			21 => 
			array (
				'id' => 22,
				'name' => 'CARDENAL CARO',
				'region_id' => 6,
			),
			22 => 
			array (
				'id' => 23,
				'name' => 'CURICÓ',
				'region_id' => 7,
			),
			23 => 
			array (
				'id' => 24,
				'name' => 'TALCA',
				'region_id' => 7,
			),
			24 => 
			array (
				'id' => 25,
				'name' => 'LINARES',
				'region_id' => 7,
			),
			25 => 
			array (
				'id' => 26,
				'name' => 'CAUQUENES',
				'region_id' => 7,
			),
			26 => 
			array (
				'id' => 27,
				'name' => 'ÑUBLE',
				'region_id' => 8,
			),
			27 => 
			array (
				'id' => 28,
				'name' => 'BIO BIO',
				'region_id' => 8,
			),
			28 => 
			array (
				'id' => 29,
				'name' => 'CONCEPCIÓN',
				'region_id' => 8,
			),
			29 => 
			array (
				'id' => 30,
				'name' => 'ARAUCO',
				'region_id' => 8,
			),
			30 => 
			array (
				'id' => 31,
				'name' => 'MALLECO',
				'region_id' => 9,
			),
			31 => 
			array (
				'id' => 32,
				'name' => 'CAUTÍN',
				'region_id' => 9,
			),
			32 => 
			array (
				'id' => 33,
				'name' => 'OSORNO',
				'region_id' => 10,
			),
			33 => 
			array (
				'id' => 34,
				'name' => 'LLANQUIHUE',
				'region_id' => 10,
			),
			34 => 
			array (
				'id' => 35,
				'name' => 'CHILOÉ',
				'region_id' => 10,
			),
			35 => 
			array (
				'id' => 36,
				'name' => 'PALENA',
				'region_id' => 10,
			),
			36 => 
			array (
				'id' => 37,
				'name' => 'CAPITÁN PRATT',
				'region_id' => 11,
			),
			37 => 
			array (
				'id' => 38,
				'name' => 'AYSÉN',
				'region_id' => 11,
			),
			38 => 
			array (
				'id' => 39,
				'name' => 'COIHAIQUE',
				'region_id' => 11,
			),
			39 => 
			array (
				'id' => 40,
				'name' => 'GENERAL CARRERA',
				'region_id' => 11,
			),
			40 => 
			array (
				'id' => 41,
				'name' => 'ÚLTIMA ESPERANZA',
				'region_id' => 12,
			),
			41 => 
			array (
				'id' => 42,
				'name' => 'MAGALLANES',
				'region_id' => 12,
			),
			42 => 
			array (
				'id' => 43,
				'name' => 'TIERRA DEL FUEGO',
				'region_id' => 12,
			),
			43 => 
			array (
				'id' => 44,
				'name' => 'ANTÁRTICA CHILENA',
				'region_id' => 12,
			),
			44 => 
			array (
				'id' => 45,
				'name' => 'SANTIAGO',
				'region_id' => 13,
			),
			45 => 
			array (
				'id' => 46,
				'name' => 'CORDILLERA',
				'region_id' => 13,
			),
			46 => 
			array (
				'id' => 47,
				'name' => 'MELIPILLA',
				'region_id' => 13,
			),
			47 => 
			array (
				'id' => 48,
				'name' => 'TALAGANTE',
				'region_id' => 13,
			),
			48 => 
			array (
				'id' => 49,
				'name' => 'MAIPO',
				'region_id' => 13,
			),
			49 => 
			array (
				'id' => 50,
				'name' => 'CHACABUCO',
				'region_id' => 13,
			),
			50 => 
			array (
				'id' => 51,
				'name' => 'VALDIVIA',
				'region_id' => 14,
			),
			51 => 
			array (
				'id' => 52,
				'name' => 'RANCO',
				'region_id' => 14,
			),
		));
	}

}
