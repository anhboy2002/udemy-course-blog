<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([
           'site_name' => "Laravel's Blog ",
            'address' => 'Dannag, VietNam',
            'contact_number' => '0934.192.156',
            'contact_email' => 'tranmanh.hungdn1201@gmail.com',
        ]);
    }
}
