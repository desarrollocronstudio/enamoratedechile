<?php

class CitiesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('cities')->truncate();
        
		\DB::table('cities')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'ARICA',
				'province_id' => 1,
				'lat' => '-18.594048500000',
				'lng' => '-69.478454100000',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'CAMARONES',
				'province_id' => 1,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'PUTRE',
				'province_id' => 2,
				'lat' => '-18.196991000000',
				'lng' => '-69.559727000000',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'GENERAL LAGOS',
				'province_id' => 2,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'IQUIQUE',
				'province_id' => 3,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'ALTO HOSPICIO',
				'province_id' => 3,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'HUARA',
				'province_id' => 3,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			7 => 
			array (
				'id' => 8,
				'name' => 'CAMIÑA',
				'province_id' => 3,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			8 => 
			array (
				'id' => 9,
				'name' => 'COLCHANE',
				'province_id' => 3,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			9 => 
			array (
				'id' => 10,
				'name' => 'PICA',
				'province_id' => 3,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			10 => 
			array (
				'id' => 11,
				'name' => 'POZO ALMONTE',
				'province_id' => 3,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			11 => 
			array (
				'id' => 12,
				'name' => 'TOCOPILLA',
				'province_id' => 4,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			12 => 
			array (
				'id' => 13,
				'name' => 'MARÍA ELENA',
				'province_id' => 4,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			13 => 
			array (
				'id' => 14,
				'name' => 'CALAMA',
				'province_id' => 5,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			14 => 
			array (
				'id' => 15,
				'name' => 'OLLAGUE',
				'province_id' => 5,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			15 => 
			array (
				'id' => 16,
				'name' => 'SAN PEDRO DE ATACAMA',
				'province_id' => 5,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			16 => 
			array (
				'id' => 17,
				'name' => 'ANTOFAGASTA',
				'province_id' => 6,
				'lat' => '-23.836910400000',
				'lng' => '-69.287753500000',
			),
			17 => 
			array (
				'id' => 18,
				'name' => 'MEJILLONES',
				'province_id' => 6,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			18 => 
			array (
				'id' => 19,
				'name' => 'SIERRA GORDA',
				'province_id' => 6,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			19 => 
			array (
				'id' => 20,
				'name' => 'TALTAL',
				'province_id' => 6,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			20 => 
			array (
				'id' => 21,
				'name' => 'CHAÑARAL',
				'province_id' => 7,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			21 => 
			array (
				'id' => 22,
				'name' => 'DIEGO DE ALMAGRO',
				'province_id' => 7,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			22 => 
			array (
				'id' => 23,
				'name' => 'COPIAPÓ',
				'province_id' => 8,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			23 => 
			array (
				'id' => 24,
				'name' => 'CALDERA',
				'province_id' => 8,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			24 => 
			array (
				'id' => 25,
				'name' => 'TIERRA AMARILLA',
				'province_id' => 8,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			25 => 
			array (
				'id' => 26,
				'name' => 'VALLENAR',
				'province_id' => 9,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			26 => 
			array (
				'id' => 27,
				'name' => 'FREIRINA',
				'province_id' => 9,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			27 => 
			array (
				'id' => 28,
				'name' => 'HUASCO',
				'province_id' => 9,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			28 => 
			array (
				'id' => 29,
				'name' => 'ALTO DEL CARMEN',
				'province_id' => 9,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			29 => 
			array (
				'id' => 30,
				'name' => 'LA SERENA',
				'province_id' => 10,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			30 => 
			array (
				'id' => 31,
				'name' => 'LA HIGUERA',
				'province_id' => 10,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			31 => 
			array (
				'id' => 32,
				'name' => 'COQUIMBO',
				'province_id' => 10,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			32 => 
			array (
				'id' => 33,
				'name' => 'ANDACOLLO',
				'province_id' => 10,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			33 => 
			array (
				'id' => 34,
				'name' => 'VICUÑA',
				'province_id' => 10,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			34 => 
			array (
				'id' => 35,
				'name' => 'PAIHUANO',
				'province_id' => 10,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			35 => 
			array (
				'id' => 36,
				'name' => 'OVALLE',
				'province_id' => 11,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			36 => 
			array (
				'id' => 37,
				'name' => 'RÍO HURTADO',
				'province_id' => 11,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			37 => 
			array (
				'id' => 38,
				'name' => 'MONTE PATRIA',
				'province_id' => 11,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			38 => 
			array (
				'id' => 39,
				'name' => 'COMBARBALÁ',
				'province_id' => 11,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			39 => 
			array (
				'id' => 40,
				'name' => 'PUNITAQUI',
				'province_id' => 11,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			40 => 
			array (
				'id' => 41,
				'name' => 'ILLAPEL',
				'province_id' => 12,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			41 => 
			array (
				'id' => 42,
				'name' => 'SALAMANCA',
				'province_id' => 12,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			42 => 
			array (
				'id' => 43,
				'name' => 'LOS VILOS',
				'province_id' => 12,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			43 => 
			array (
				'id' => 44,
				'name' => 'CANELA',
				'province_id' => 12,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			44 => 
			array (
				'id' => 45,
				'name' => 'VALPARAÍSO',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			45 => 
			array (
				'id' => 46,
				'name' => 'CASABLANCA',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			46 => 
			array (
				'id' => 47,
				'name' => 'CONCON',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			47 => 
			array (
				'id' => 48,
				'name' => 'JUAN FERNÁNDEZ',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			48 => 
			array (
				'id' => 49,
				'name' => 'PUCHUNCAVÍ',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			49 => 
			array (
				'id' => 50,
				'name' => 'QUILPUÉ',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			50 => 
			array (
				'id' => 51,
				'name' => 'QUINTERO',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			51 => 
			array (
				'id' => 52,
				'name' => 'VILLA ALEMANA',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			52 => 
			array (
				'id' => 53,
				'name' => 'VIÑA DEL MAR',
				'province_id' => 13,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			53 => 
			array (
				'id' => 54,
				'name' => 'PETORCA',
				'province_id' => 14,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			54 => 
			array (
				'id' => 55,
				'name' => 'LA LIGUA',
				'province_id' => 14,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			55 => 
			array (
				'id' => 56,
				'name' => 'CABILDO',
				'province_id' => 14,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			56 => 
			array (
				'id' => 57,
				'name' => 'PAPUDO',
				'province_id' => 14,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			57 => 
			array (
				'id' => 58,
				'name' => 'ZAPALLAR',
				'province_id' => 14,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			58 => 
			array (
				'id' => 59,
				'name' => 'LOS ANDES',
				'province_id' => 15,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			59 => 
			array (
				'id' => 60,
				'name' => 'SAN ESTEBAN',
				'province_id' => 15,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			60 => 
			array (
				'id' => 61,
				'name' => 'CALLE LARGA',
				'province_id' => 15,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			61 => 
			array (
				'id' => 62,
				'name' => 'RINCONADA',
				'province_id' => 15,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			62 => 
			array (
				'id' => 63,
				'name' => 'SAN FELIPE',
				'province_id' => 16,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			63 => 
			array (
				'id' => 64,
				'name' => 'CATEMU',
				'province_id' => 16,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			64 => 
			array (
				'id' => 65,
				'name' => 'LLAY LLAY',
				'province_id' => 16,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			65 => 
			array (
				'id' => 66,
				'name' => 'PANQUEHUE',
				'province_id' => 16,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			66 => 
			array (
				'id' => 67,
				'name' => 'PUTAENDO',
				'province_id' => 16,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			67 => 
			array (
				'id' => 68,
				'name' => 'SANTA MARÍA',
				'province_id' => 16,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			68 => 
			array (
				'id' => 69,
				'name' => 'QUILLOTA',
				'province_id' => 17,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			69 => 
			array (
				'id' => 70,
				'name' => 'CALERA',
				'province_id' => 17,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			70 => 
			array (
				'id' => 71,
				'name' => 'HIJUELAS',
				'province_id' => 17,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			71 => 
			array (
				'id' => 72,
				'name' => 'LIMACHE',
				'province_id' => 17,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			72 => 
			array (
				'id' => 73,
				'name' => 'LA CRUZ',
				'province_id' => 17,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			73 => 
			array (
				'id' => 74,
				'name' => 'NOGALES',
				'province_id' => 17,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			74 => 
			array (
				'id' => 75,
				'name' => 'OLMUÉ',
				'province_id' => 17,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			75 => 
			array (
				'id' => 76,
				'name' => 'SAN ANTONIO',
				'province_id' => 18,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			76 => 
			array (
				'id' => 77,
				'name' => 'ALGARROBO',
				'province_id' => 18,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			77 => 
			array (
				'id' => 78,
				'name' => 'CARTAGENA',
				'province_id' => 18,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			78 => 
			array (
				'id' => 79,
				'name' => 'EL QUISCO',
				'province_id' => 18,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			79 => 
			array (
				'id' => 80,
				'name' => 'EL TABO',
				'province_id' => 18,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			80 => 
			array (
				'id' => 81,
				'name' => 'SANTO DOMINGO',
				'province_id' => 18,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			81 => 
			array (
				'id' => 82,
				'name' => 'ISLA DE PASCUA',
				'province_id' => 19,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			82 => 
			array (
				'id' => 83,
				'name' => 'RANCAHUA',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			83 => 
			array (
				'id' => 84,
				'name' => 'CODEGUA',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			84 => 
			array (
				'id' => 85,
				'name' => 'COINCO',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			85 => 
			array (
				'id' => 86,
				'name' => 'COLTAUCO',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			86 => 
			array (
				'id' => 87,
				'name' => 'DOÑIHUE',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			87 => 
			array (
				'id' => 88,
				'name' => 'GRANEROS',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			88 => 
			array (
				'id' => 89,
				'name' => 'LAS CABRAS',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			89 => 
			array (
				'id' => 90,
				'name' => 'MOSTAZAL',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			90 => 
			array (
				'id' => 91,
				'name' => 'MACHALÍ',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			91 => 
			array (
				'id' => 92,
				'name' => 'MALLOA',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			92 => 
			array (
				'id' => 93,
				'name' => 'OLIVAR',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			93 => 
			array (
				'id' => 94,
				'name' => 'PEUMO',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			94 => 
			array (
				'id' => 95,
				'name' => 'PICHIDEGUA',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			95 => 
			array (
				'id' => 96,
				'name' => 'QUINTA DE TILCOCO',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			96 => 
			array (
				'id' => 97,
				'name' => 'RENGO',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			97 => 
			array (
				'id' => 98,
				'name' => 'REQUINOA',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			98 => 
			array (
				'id' => 99,
				'name' => 'SAN VICENTE',
				'province_id' => 20,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			99 => 
			array (
				'id' => 100,
				'name' => 'SAN FERNANDO',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			100 => 
			array (
				'id' => 101,
				'name' => 'CHÉPICA',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			101 => 
			array (
				'id' => 102,
				'name' => 'CHIMBARONGO',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			102 => 
			array (
				'id' => 103,
				'name' => 'LOLOL',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			103 => 
			array (
				'id' => 104,
				'name' => 'NANCAHUA',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			104 => 
			array (
				'id' => 105,
				'name' => 'PALMILLA',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			105 => 
			array (
				'id' => 106,
				'name' => 'PERALILLO',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			106 => 
			array (
				'id' => 107,
				'name' => 'PLACILLA',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			107 => 
			array (
				'id' => 108,
				'name' => 'PUMANQUE',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			108 => 
			array (
				'id' => 109,
				'name' => 'SANTA CRUZ',
				'province_id' => 21,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			109 => 
			array (
				'id' => 110,
				'name' => 'PICHILEMU',
				'province_id' => 22,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			110 => 
			array (
				'id' => 111,
				'name' => 'LA ESTRELLA',
				'province_id' => 22,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			111 => 
			array (
				'id' => 112,
				'name' => 'LITUECHE',
				'province_id' => 22,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			112 => 
			array (
				'id' => 113,
				'name' => 'MARCHIGUE',
				'province_id' => 22,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			113 => 
			array (
				'id' => 114,
				'name' => 'NAVIDAD',
				'province_id' => 22,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			114 => 
			array (
				'id' => 115,
				'name' => 'PAREDONES',
				'province_id' => 22,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			115 => 
			array (
				'id' => 116,
				'name' => 'CURICÓ',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			116 => 
			array (
				'id' => 117,
				'name' => 'TENO',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			117 => 
			array (
				'id' => 118,
				'name' => 'ROMERAL',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			118 => 
			array (
				'id' => 119,
				'name' => 'MOLINA',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			119 => 
			array (
				'id' => 120,
				'name' => 'SAGRADA FAMILIA',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			120 => 
			array (
				'id' => 121,
				'name' => 'HUALAÑÉ',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			121 => 
			array (
				'id' => 122,
				'name' => 'LICANTÉN',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			122 => 
			array (
				'id' => 123,
				'name' => 'VICHUQUÉN',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			123 => 
			array (
				'id' => 124,
				'name' => 'RAUCO',
				'province_id' => 23,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			124 => 
			array (
				'id' => 125,
				'name' => 'TALCA',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			125 => 
			array (
				'id' => 126,
				'name' => 'PELARCO',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			126 => 
			array (
				'id' => 127,
				'name' => 'RÍO CLARO',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			127 => 
			array (
				'id' => 128,
				'name' => 'SAN CLEMENTE',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			128 => 
			array (
				'id' => 129,
				'name' => 'MAULE',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			129 => 
			array (
				'id' => 130,
				'name' => 'SAN RAFAEL',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			130 => 
			array (
				'id' => 131,
				'name' => 'EMPEDRADO',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			131 => 
			array (
				'id' => 132,
				'name' => 'PENCAHUE',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			132 => 
			array (
				'id' => 133,
				'name' => 'CONSTITUCIÓN',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			133 => 
			array (
				'id' => 134,
				'name' => 'CUREPTO',
				'province_id' => 24,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			134 => 
			array (
				'id' => 135,
				'name' => 'LINARES',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			135 => 
			array (
				'id' => 136,
				'name' => 'YERBAS BUENAS',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			136 => 
			array (
				'id' => 137,
				'name' => 'COLBÚN',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			137 => 
			array (
				'id' => 138,
				'name' => 'LONGAVÍ',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			138 => 
			array (
				'id' => 139,
				'name' => 'PARRAL',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			139 => 
			array (
				'id' => 140,
				'name' => 'RETIRO',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			140 => 
			array (
				'id' => 141,
				'name' => 'VILLA ALEGRE',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			141 => 
			array (
				'id' => 142,
				'name' => 'SAN JAVIER',
				'province_id' => 25,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			142 => 
			array (
				'id' => 143,
				'name' => 'CAUQUENES',
				'province_id' => 26,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			143 => 
			array (
				'id' => 144,
				'name' => 'PELUHUE',
				'province_id' => 26,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			144 => 
			array (
				'id' => 145,
				'name' => 'CHANCO',
				'province_id' => 26,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			145 => 
			array (
				'id' => 146,
				'name' => 'CHILLÁN',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			146 => 
			array (
				'id' => 147,
				'name' => 'BULNES',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			147 => 
			array (
				'id' => 148,
				'name' => 'CHILLAN VIEJO',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			148 => 
			array (
				'id' => 149,
				'name' => 'COBQUECURA',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			149 => 
			array (
				'id' => 150,
				'name' => 'COELEMU',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			150 => 
			array (
				'id' => 151,
				'name' => 'COIHUECO',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			151 => 
			array (
				'id' => 152,
				'name' => 'EL CARMEN',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			152 => 
			array (
				'id' => 153,
				'name' => 'NINHUE',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			153 => 
			array (
				'id' => 154,
				'name' => 'ÑIQUÉN',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			154 => 
			array (
				'id' => 155,
				'name' => 'PEMUCO',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			155 => 
			array (
				'id' => 156,
				'name' => 'PINTO',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			156 => 
			array (
				'id' => 157,
				'name' => 'PORTEZUELO',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			157 => 
			array (
				'id' => 158,
				'name' => 'QUILLÓN',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			158 => 
			array (
				'id' => 159,
				'name' => 'QUIRIHUE',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			159 => 
			array (
				'id' => 160,
				'name' => 'RANQUIL',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			160 => 
			array (
				'id' => 161,
				'name' => 'SAN CARLOS',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			161 => 
			array (
				'id' => 162,
				'name' => 'SAN FABIÁN',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			162 => 
			array (
				'id' => 163,
				'name' => 'SAN IGNACIO',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			163 => 
			array (
				'id' => 164,
				'name' => 'SAN NICOLÁS',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			164 => 
			array (
				'id' => 165,
				'name' => 'TREHUACO',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			165 => 
			array (
				'id' => 166,
				'name' => 'YUNGAY',
				'province_id' => 27,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			166 => 
			array (
				'id' => 167,
				'name' => 'LOS ANGELES',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			167 => 
			array (
				'id' => 168,
				'name' => 'ALTO BIO BIO',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			168 => 
			array (
				'id' => 169,
				'name' => 'ANTUCO',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			169 => 
			array (
				'id' => 170,
				'name' => 'CABRERO',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			170 => 
			array (
				'id' => 171,
				'name' => 'LAJA',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			171 => 
			array (
				'id' => 172,
				'name' => 'MULCHÉN',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			172 => 
			array (
				'id' => 173,
				'name' => 'NACIMIENTO',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			173 => 
			array (
				'id' => 174,
				'name' => 'NEGRETE',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			174 => 
			array (
				'id' => 175,
				'name' => 'QUILACO',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			175 => 
			array (
				'id' => 176,
				'name' => 'QUILLECO',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			176 => 
			array (
				'id' => 177,
				'name' => 'SANTA BÁRBARA',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			177 => 
			array (
				'id' => 178,
				'name' => 'SAN ROSENDO',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			178 => 
			array (
				'id' => 179,
				'name' => 'TUCAPEL',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			179 => 
			array (
				'id' => 180,
				'name' => 'YUMBEL',
				'province_id' => 28,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			180 => 
			array (
				'id' => 181,
				'name' => 'CONCEPCIÓN',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			181 => 
			array (
				'id' => 182,
				'name' => 'CHIGUAYANTE',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			182 => 
			array (
				'id' => 183,
				'name' => 'CORONEL',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			183 => 
			array (
				'id' => 184,
				'name' => 'FLORIDA',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			184 => 
			array (
				'id' => 185,
				'name' => 'HUALPÉN',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			185 => 
			array (
				'id' => 186,
				'name' => 'HUALQUI',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			186 => 
			array (
				'id' => 187,
				'name' => 'LOTA',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			187 => 
			array (
				'id' => 188,
				'name' => 'PENCO',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			188 => 
			array (
				'id' => 189,
				'name' => 'SAN PEDRO DE LA PAZ',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			189 => 
			array (
				'id' => 190,
				'name' => 'SANTA JUANA',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			190 => 
			array (
				'id' => 191,
				'name' => 'TALCAHUANO',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			191 => 
			array (
				'id' => 192,
				'name' => 'TOMÉ',
				'province_id' => 29,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			192 => 
			array (
				'id' => 193,
				'name' => 'ARAUCO',
				'province_id' => 30,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			193 => 
			array (
				'id' => 194,
				'name' => 'CAÑETE',
				'province_id' => 30,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			194 => 
			array (
				'id' => 195,
				'name' => 'CONTULMO',
				'province_id' => 30,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			195 => 
			array (
				'id' => 196,
				'name' => 'CURANILAHUE',
				'province_id' => 30,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			196 => 
			array (
				'id' => 197,
				'name' => 'LEBU',
				'province_id' => 30,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			197 => 
			array (
				'id' => 198,
				'name' => 'LOS ALAMOS',
				'province_id' => 30,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			198 => 
			array (
				'id' => 199,
				'name' => 'TIRUA',
				'province_id' => 30,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			199 => 
			array (
				'id' => 200,
				'name' => 'ANGOL',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			200 => 
			array (
				'id' => 201,
				'name' => 'COLLIPULLI',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			201 => 
			array (
				'id' => 202,
				'name' => 'CURACAUTÍN',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			202 => 
			array (
				'id' => 203,
				'name' => 'ERCILLA',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			203 => 
			array (
				'id' => 204,
				'name' => 'LONQUIMAY',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			204 => 
			array (
				'id' => 205,
				'name' => 'LOS SAUCES',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			205 => 
			array (
				'id' => 206,
				'name' => 'LUMACO',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			206 => 
			array (
				'id' => 207,
				'name' => 'PURÉN',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			207 => 
			array (
				'id' => 208,
				'name' => 'REINACO',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			208 => 
			array (
				'id' => 209,
				'name' => 'TRAIGUÉN',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			209 => 
			array (
				'id' => 210,
				'name' => 'VICTORIA',
				'province_id' => 31,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			210 => 
			array (
				'id' => 211,
				'name' => 'TEMUCO',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			211 => 
			array (
				'id' => 212,
				'name' => 'CARAHUE',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			212 => 
			array (
				'id' => 213,
				'name' => 'CHOLCHOL',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			213 => 
			array (
				'id' => 214,
				'name' => 'CUNCO',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			214 => 
			array (
				'id' => 215,
				'name' => 'CURARREHUE',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			215 => 
			array (
				'id' => 216,
				'name' => 'FREIRE',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			216 => 
			array (
				'id' => 217,
				'name' => 'GALVARINO',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			217 => 
			array (
				'id' => 218,
				'name' => 'GORBEA',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			218 => 
			array (
				'id' => 219,
				'name' => 'LAUTARO',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			219 => 
			array (
				'id' => 220,
				'name' => 'LONCOCHE',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			220 => 
			array (
				'id' => 221,
				'name' => 'MELIPEUCO',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			221 => 
			array (
				'id' => 222,
				'name' => 'NUEVA IMPERIAL',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			222 => 
			array (
				'id' => 223,
				'name' => 'PADRE LAS CASAS',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			223 => 
			array (
				'id' => 224,
				'name' => 'PERQUENCO',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			224 => 
			array (
				'id' => 225,
				'name' => 'PITRUFQUÉN',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			225 => 
			array (
				'id' => 226,
				'name' => 'PUCÓN',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			226 => 
			array (
				'id' => 227,
				'name' => 'SAAVEDRA',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			227 => 
			array (
				'id' => 228,
				'name' => 'TEODORO SCHMIDT',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			228 => 
			array (
				'id' => 229,
				'name' => 'TOLTÉN',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			229 => 
			array (
				'id' => 230,
				'name' => 'VILCÚN',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			230 => 
			array (
				'id' => 231,
				'name' => 'VILLARICA',
				'province_id' => 32,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			231 => 
			array (
				'id' => 232,
				'name' => 'OSORNO',
				'province_id' => 33,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			232 => 
			array (
				'id' => 233,
				'name' => 'PUERTO OCTAY',
				'province_id' => 33,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			233 => 
			array (
				'id' => 234,
				'name' => 'PURRANQUE',
				'province_id' => 33,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			234 => 
			array (
				'id' => 235,
				'name' => 'PUYEHUE',
				'province_id' => 33,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			235 => 
			array (
				'id' => 236,
				'name' => 'RÍO NEGRO',
				'province_id' => 33,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			236 => 
			array (
				'id' => 237,
				'name' => 'SAN JUAN DE LA COSTA',
				'province_id' => 33,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			237 => 
			array (
				'id' => 238,
				'name' => 'SAN PABLO',
				'province_id' => 33,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			238 => 
			array (
				'id' => 239,
				'name' => 'CALBUCO',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			239 => 
			array (
				'id' => 240,
				'name' => 'COCHAMÓ',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			240 => 
			array (
				'id' => 241,
				'name' => 'FRESIA',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			241 => 
			array (
				'id' => 242,
				'name' => 'FRUTILLAR',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			242 => 
			array (
				'id' => 243,
				'name' => 'LOS MUERMOS',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			243 => 
			array (
				'id' => 244,
				'name' => 'LLANQUIHUE',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			244 => 
			array (
				'id' => 245,
				'name' => 'MAULLÍN',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			245 => 
			array (
				'id' => 246,
				'name' => 'PUERTO MONTT',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			246 => 
			array (
				'id' => 247,
				'name' => 'PUERTO VARAS',
				'province_id' => 34,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			247 => 
			array (
				'id' => 248,
				'name' => 'CHILOÉ',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			248 => 
			array (
				'id' => 249,
				'name' => 'ANCUD',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			249 => 
			array (
				'id' => 250,
				'name' => 'CASTRO',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			250 => 
			array (
				'id' => 251,
				'name' => 'CURACO DE VÉLEZ',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			251 => 
			array (
				'id' => 252,
				'name' => 'CHONCHI',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			252 => 
			array (
				'id' => 253,
				'name' => 'DALCAHUE',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			253 => 
			array (
				'id' => 254,
				'name' => 'PUQUELDÓN',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			254 => 
			array (
				'id' => 255,
				'name' => 'QUEILÉN',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			255 => 
			array (
				'id' => 256,
				'name' => 'QUELLÓN',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			256 => 
			array (
				'id' => 257,
				'name' => 'QUEMCHI',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			257 => 
			array (
				'id' => 258,
				'name' => 'QUINCHAO',
				'province_id' => 35,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			258 => 
			array (
				'id' => 259,
				'name' => 'CHAITÉN',
				'province_id' => 36,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			259 => 
			array (
				'id' => 260,
				'name' => 'FUTALEUFÚ',
				'province_id' => 36,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			260 => 
			array (
				'id' => 261,
				'name' => 'HUALAIHUÉ',
				'province_id' => 36,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			261 => 
			array (
				'id' => 262,
				'name' => 'PALENA',
				'province_id' => 36,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			262 => 
			array (
				'id' => 263,
				'name' => 'COCHRANE',
				'province_id' => 37,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			263 => 
			array (
				'id' => 264,
				'name' => 'O\' HIGGINS',
				'province_id' => 37,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			264 => 
			array (
				'id' => 265,
				'name' => 'TORTEL',
				'province_id' => 37,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			265 => 
			array (
				'id' => 266,
				'name' => 'AYSÉN',
				'province_id' => 38,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			266 => 
			array (
				'id' => 267,
				'name' => 'CISNES',
				'province_id' => 38,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			267 => 
			array (
				'id' => 268,
				'name' => 'GUAITECAS',
				'province_id' => 38,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			268 => 
			array (
				'id' => 269,
				'name' => 'COIHAIQUE',
				'province_id' => 39,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			269 => 
			array (
				'id' => 270,
				'name' => 'LAGO VERDE',
				'province_id' => 39,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			270 => 
			array (
				'id' => 271,
				'name' => 'CHILE CHICO',
				'province_id' => 40,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			271 => 
			array (
				'id' => 272,
				'name' => 'RÍO IBAÑEZ',
				'province_id' => 40,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			272 => 
			array (
				'id' => 273,
				'name' => 'NATALES',
				'province_id' => 41,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			273 => 
			array (
				'id' => 274,
				'name' => 'TORRES DEL PAINE',
				'province_id' => 41,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			274 => 
			array (
				'id' => 275,
				'name' => 'PUNTA ARENAS',
				'province_id' => 42,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			275 => 
			array (
				'id' => 276,
				'name' => 'RÍO VERDE',
				'province_id' => 42,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			276 => 
			array (
				'id' => 277,
				'name' => 'LAGUNA BLANCA',
				'province_id' => 42,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			277 => 
			array (
				'id' => 278,
				'name' => 'SAN GREGORIO',
				'province_id' => 42,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			278 => 
			array (
				'id' => 279,
				'name' => 'PORVENIR',
				'province_id' => 43,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			279 => 
			array (
				'id' => 280,
				'name' => 'PRIMAVERA',
				'province_id' => 43,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			280 => 
			array (
				'id' => 281,
				'name' => 'TIMAUKEL',
				'province_id' => 43,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			281 => 
			array (
				'id' => 282,
				'name' => 'NAVARINO',
				'province_id' => 44,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			282 => 
			array (
				'id' => 283,
				'name' => 'ANTÁRTICA',
				'province_id' => 44,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			283 => 
			array (
				'id' => 284,
				'name' => 'CERRILLOS',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			284 => 
			array (
				'id' => 285,
				'name' => 'CERRO NAVIA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			285 => 
			array (
				'id' => 286,
				'name' => 'CONCHALÍ',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			286 => 
			array (
				'id' => 287,
				'name' => 'EL BOSQUE',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			287 => 
			array (
				'id' => 288,
				'name' => 'ESTACIÓN CENTRAL',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			288 => 
			array (
				'id' => 289,
				'name' => 'HUECHURABA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			289 => 
			array (
				'id' => 290,
				'name' => 'INDEPENDENCIA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			290 => 
			array (
				'id' => 291,
				'name' => 'LA CISTERNA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			291 => 
			array (
				'id' => 292,
				'name' => 'LA FLORIDA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			292 => 
			array (
				'id' => 293,
				'name' => 'LA GRANJA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			293 => 
			array (
				'id' => 294,
				'name' => 'LA PINTANA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			294 => 
			array (
				'id' => 295,
				'name' => 'LA REINA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			295 => 
			array (
				'id' => 296,
				'name' => 'LAS CONDES',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			296 => 
			array (
				'id' => 297,
				'name' => 'LO BARNECHEA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			297 => 
			array (
				'id' => 298,
				'name' => 'LO ESPEJO',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			298 => 
			array (
				'id' => 299,
				'name' => 'LO PRADO',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			299 => 
			array (
				'id' => 300,
				'name' => 'MACÚL',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			300 => 
			array (
				'id' => 301,
				'name' => 'MAIPÚ',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			301 => 
			array (
				'id' => 302,
				'name' => 'ÑUÑOA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			302 => 
			array (
				'id' => 303,
				'name' => 'PEDRO AGUIRRE CERDA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			303 => 
			array (
				'id' => 304,
				'name' => 'PEÑALOLÉN',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			304 => 
			array (
				'id' => 305,
				'name' => 'PROVIDENCIA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			305 => 
			array (
				'id' => 306,
				'name' => 'PUDAHUEL',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			306 => 
			array (
				'id' => 307,
				'name' => 'QUILICURA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			307 => 
			array (
				'id' => 308,
				'name' => 'QUINTA NORMAL',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			308 => 
			array (
				'id' => 309,
				'name' => 'RECOLETA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			309 => 
			array (
				'id' => 310,
				'name' => 'RENCA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			310 => 
			array (
				'id' => 311,
				'name' => 'SAN JOAQUÍN',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			311 => 
			array (
				'id' => 312,
				'name' => 'SAN MIGUEL',
				'province_id' => 45,
				'lat' => '-33.492251000000',
				'lng' => '-70.652589000000',
			),
			312 => 
			array (
				'id' => 313,
				'name' => 'SAN RAMÓN',
				'province_id' => 45,
				'lat' => '-33.530029700000',
				'lng' => '-70.680045800000',
			),
			313 => 
			array (
				'id' => 314,
				'name' => 'SANTIAGO',
				'province_id' => 45,
				'lat' => '-33.461779500000',
				'lng' => '-70.598094200000',
			),
			314 => 
			array (
				'id' => 315,
				'name' => 'VITACURA',
				'province_id' => 45,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			315 => 
			array (
				'id' => 316,
				'name' => 'PUENTE ALTO',
				'province_id' => 46,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			316 => 
			array (
				'id' => 317,
				'name' => 'PIRQUE',
				'province_id' => 46,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			317 => 
			array (
				'id' => 318,
				'name' => 'SAN JOSÉ DE MAIPO',
				'province_id' => 46,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			318 => 
			array (
				'id' => 319,
				'name' => 'MELIPILLA',
				'province_id' => 47,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			319 => 
			array (
				'id' => 320,
				'name' => 'MARÍA PINTO',
				'province_id' => 47,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			320 => 
			array (
				'id' => 321,
				'name' => 'CURACAVÍ',
				'province_id' => 47,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			321 => 
			array (
				'id' => 322,
				'name' => 'ALHUÉ',
				'province_id' => 47,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			322 => 
			array (
				'id' => 323,
				'name' => 'SAN PEDRO',
				'province_id' => 47,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			323 => 
			array (
				'id' => 324,
				'name' => 'TALAGANTE',
				'province_id' => 48,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			324 => 
			array (
				'id' => 325,
				'name' => 'EL MONTE',
				'province_id' => 48,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			325 => 
			array (
				'id' => 326,
				'name' => 'ISLA DE MAIPO',
				'province_id' => 48,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			326 => 
			array (
				'id' => 327,
				'name' => 'PADRE HURTADO',
				'province_id' => 48,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			327 => 
			array (
				'id' => 328,
				'name' => 'PEÑAFLOR',
				'province_id' => 48,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			328 => 
			array (
				'id' => 329,
				'name' => 'BUIN',
				'province_id' => 49,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			329 => 
			array (
				'id' => 330,
				'name' => 'CALERA DE TANGO',
				'province_id' => 49,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			330 => 
			array (
				'id' => 331,
				'name' => 'PAINE',
				'province_id' => 49,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			331 => 
			array (
				'id' => 332,
				'name' => 'SAN BERNARDO',
				'province_id' => 49,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			332 => 
			array (
				'id' => 333,
				'name' => 'COLINA',
				'province_id' => 50,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			333 => 
			array (
				'id' => 334,
				'name' => 'LAMPA',
				'province_id' => 50,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			334 => 
			array (
				'id' => 335,
				'name' => 'TIL TIL',
				'province_id' => 50,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			335 => 
			array (
				'id' => 336,
				'name' => 'VALDIVIA',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			336 => 
			array (
				'id' => 337,
				'name' => 'CORRAL',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			337 => 
			array (
				'id' => 338,
				'name' => 'LANCO',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			338 => 
			array (
				'id' => 339,
				'name' => 'LOS LAGOS',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			339 => 
			array (
				'id' => 340,
				'name' => 'MAFIL',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			340 => 
			array (
				'id' => 341,
				'name' => 'MARIQUINA',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			341 => 
			array (
				'id' => 342,
				'name' => 'PAILLACO',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			342 => 
			array (
				'id' => 343,
				'name' => 'PANGUIPULLI',
				'province_id' => 51,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			343 => 
			array (
				'id' => 344,
				'name' => 'LA UNION',
				'province_id' => 52,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			344 => 
			array (
				'id' => 345,
				'name' => 'FUTRONO',
				'province_id' => 52,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			345 => 
			array (
				'id' => 346,
				'name' => 'LAGO RANCO',
				'province_id' => 52,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
			346 => 
			array (
				'id' => 347,
				'name' => 'RÍO BUENO',
				'province_id' => 52,
				'lat' => '0.000000000000',
				'lng' => '0.000000000000',
			),
		));
	}

}
