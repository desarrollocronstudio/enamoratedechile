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
				'featured'		=> true,
				'name' 			=> 'Jenny 1',
				'youtube_code'	=> 'AZNRG0-B0DA'
			),
			array (
				'type' 			=> 'jenny',
				'featured'		=> false,
				'active'		=> true,
				'name' 			=> 'Jenny 2',
				'youtube_code'	=> 'vG3A-17m0o8'
			),
			array (
				'type' 			=> 'jenny',
				'featured'		=> false,
				'active'		=> true,
				'name' 			=> 'Jenny 3',
				'youtube_code'	=> '7Zs0LhKZhQU'
			),
			array (
				'type' 			=> 'jenny',
				'featured'		=> false,
				'active'		=> true,
				'name' 			=> 'Jenny 4',
				'youtube_code'	=> 'J8BKS0O1w9c'
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
