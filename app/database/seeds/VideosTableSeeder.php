<?php

class VideosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('videos')->truncate();
        
		\DB::table('videos')->insert(array (
		 	array (
				'type' 			=> 'jenny',
				'active'		=> true,
				'featured'		=> false,
				'name' 			=> 'PATAGONIA DE MI CORAZON',
				'youtube_code'	=> 'AZNRG0-B0DA'
			),
			array (
				'type' 			=> 'jenny',
				'featured'		=> false,
				'active'		=> true,
				'name' 			=> 'CARRETE DE PASION',
				'youtube_code'	=> 'vG3A-17m0o8'
			),
			array (
				'type' 			=> 'jenny',
				'featured'		=> true,
				'active'		=> true,
				'name' 			=> 'LA CHICA DE SERENA',
				'youtube_code'	=> '7Zs0LhKZhQU'
			),
			array (
				'type' 			=> 'jenny',
				'featured'		=> false,
				'active'		=> true,
				'name' 			=> 'AGUACERO DE AMOR',
				'youtube_code'	=> 'bj0JhApNrGQ'
			),

			//IDEAL
			array (
				'type' 			=> 'ideal',
				'featured'		=> true,
				'active'		=> true,
				'name' 			=> 'Safety Instructions',
				'youtube_code'	=> 'DuiuM-gmqto'
			),

			array (
				'type' 			=> 'ideal',
				'featured'		=> false,
				'active'		=> true,
				'name' 			=> 'Ad from 1992',
				'youtube_code'	=> 'jst3DOHfvrQ'
			),

		));
	}

}
