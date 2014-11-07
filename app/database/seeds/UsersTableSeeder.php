<?php


class UsersTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->insert(array(
            'username' => 'admin',
            'password' => Hash::make('123'),
            'email' => 'admin@unsm.edu.pe'
        ));
	}

}