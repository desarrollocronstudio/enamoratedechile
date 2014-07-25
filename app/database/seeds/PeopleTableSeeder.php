<?php

class PeopleTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('people')->truncate();
        
		\DB::table('people')->insert(array (
			0 => 
			array (
				'id' => 1,
				'fbid' => '10204354463800390',
				'name' => 'Gonzalo De Spirito Zúñiga',
				'last_name' => '',
				'email' => 'gonzunigad@gmail.com',
				'phone' => '',
				'dni' => '176010673',
				'password' => '$2y$10$H7AiT06eIzfH8GliYad.IeEdOwfJjUJKXxRiHl02lu24PA7wLH58K',
				'remember_token' => NULL,
				'dni_type' => 'rut',
				'description' => '',
				'active' => 0,
				'confirmed_email' => 0,
				'created_at' => '2014-07-25 03:51:20',
				'updated_at' => '2014-07-25 03:51:20',
				'deleted_at' => NULL,
			),
		));
	}

}
