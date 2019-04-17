<?php

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\Models\User::create([
           'name' => 'Manh Hung',
            'email' => 'anhboy1@gmail.com',
            'password' => bcrypt('12345678'),
            'admin' => 1,
        ]);

        App\Models\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/1.png',
            'about' => ' If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
    }
}
