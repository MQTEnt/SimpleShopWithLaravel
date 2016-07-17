<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\About;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('AboutsTableSeeder');
	}

}

class AboutsTableSeeder extends Seeder {

    public function run()
    {
        About::create(
        	[
	        	'name' => 'about',
	        	'type' => 'about',
	        	'value' => 'about your shop...'
        	]
        );
        About::create(
        	[
	        	'name' => 'facebook',
	        	'type' => 'socialnetwork',
	        	'value' => 'facebook.com/user'
        	]
        );
        About::create(
        	[
	        	'name' => 'twitter',
	        	'type' => 'socialnetwork',
	        	'value' => 'twitter.com/user'
        	]
        );
        About::create(
        	[
	        	'name' => 'email',
	        	'type' => 'email',
	        	'value' => 'user@gmail.com'
        	]
        );
        About::create(
        	[
	        	'name' => 'phone',
	        	'type' => 'phone',
	        	'value' => '0123456789'
        	]
        );
    }
}