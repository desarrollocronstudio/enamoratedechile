<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Base extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('tips_categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->engine = 'MyISAM';
		});
		Schema::create('people', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fbid');
			$table->string('name');
			$table->string('last_name');
			$table->string('email');
			$table->string('phone');
			$table->string('dni');
			$table->char('dni_type',3);
			$table->text('description');

			$table->timestamps();
            $table->softDeletes();
            $table->engine = 'MyISAM';
		});
		Schema::create('regions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->engine = 'MyISAM';
		});
		Schema::create('provinces', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer("region_id")->unsigned();
			$table->foreign("region_id")->references('id')->on("regions");
			$table->engine = 'MyISAM';
		});
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer("province_id")->unsigned();
			$table->foreign("province_id")->references('id')->on("provinces");
			$table->float('lat');
			$table->float('lng');
			$table->engine = 'MyISAM';
		});
		Schema::create('tip_votes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('tip_id')->unsigned();
            $table->foreign('author_id')->references('id')->on("people");
            $table->foreign('tip_id')->references('id')->on("tips");

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'MyISAM';
        });
		Schema::create('tips', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('images');
            $table->text('content');
            $table->integer('author_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('author_id')->references('id')->on("people");
            $table->foreign('type_id')->references('id')->on("tips_categories");

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'MyISAM';
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tips');
		Schema::drop('tips_categories');
		Schema::drop('cities');
		Schema::drop('regions');
		Schema::drop('people');
	}

}
