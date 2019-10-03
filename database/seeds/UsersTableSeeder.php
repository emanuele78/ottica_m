<?php
	
	use Illuminate\Database\Seeder;
	
	class UsersTableSeeder extends Seeder {
		
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			
			//users table seeder
			App\User::create(
			  [
				'name' => 'Emanuele',
				'email' => 'studiobe4@studiobe4.com',
				'password' => bcrypt('studiobe4'),
			  ]);
			App\User::create(
			  [
				'name' => 'otticamancini',
				'email' => 'info@otticamancini.com',
				'password' => bcrypt('123otticamancini'),
			  ]);
			
		}
	}
