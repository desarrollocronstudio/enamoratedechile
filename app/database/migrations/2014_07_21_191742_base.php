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
			$table->integer('order');
			$table->text('description')->nullable();
            $table->text('images')->nullable();
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
			$table->string('password');
			$table->rememberToken();
			$table->char('dni_type',3);
			$table->text('description');
			$table->boolean('active');
			$table->boolean('confirmed_email');
			$table->timestamps();
            $table->softDeletes();
            $table->engine = 'MyISAM';
		});
		Schema::create('regions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('code');
			$table->string('large_name');
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
            $table->decimal('lat','18','12');
			$table->decimal('lng','18','12');
			$table->engine = 'MyISAM';
		});
		Schema::create('tip_votes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('tip_id')->unsigned();
            $table->integer('rating')->unsigned();
            $table->boolean('approved');
            $table->text('comment');
            $table->boolean('spam');
            $table->foreign('author_id')->references('id')->on("people");
            $table->foreign('tip_id')->references('id')->on("tips");

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'MyISAM';
        });
		Schema::create('tips', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('city_name');
            $table->string('place_name');
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->string('default_image')->nullable();
            $table->float('rating_cache');
            $table->integer('rating_count');
            $table->decimal('lat','18','12');
			$table->decimal('lng','18','12');
            $table->text('content');
            $table->boolean("active")->default(false);
            $table->integer('author_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('author_id')->references('id')->on("people");
            $table->foreign('type_id')->references('id')->on("tips_categories");

            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'MyISAM';
        });

        Schema::create('tips_person', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('tip_id')->unsigned();
            $table->foreign('author_id')->references('id')->on("people");
            $table->foreign('tip_id')->references('id')->on("tips");
            $table->timestamps();
            $table->engine = 'MyISAM';
        });

        Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type',array('ideal','jenny'));
            $table->string('youtube_code');
            $table->boolean('active');
            $table->boolean('featured');
            $table->timestamps();
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
		Schema::drop('provinces');
		Schema::drop('tip_votes');
		Schema::drop('people');
		Schema::drop('tips_person');
		Schema::drop('videos');
	}

}