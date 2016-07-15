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
	        	'name' => 'phone',
	        	'type' => 'phone',
	        	'value' => '0123456789'
        	]
        );
    }
}