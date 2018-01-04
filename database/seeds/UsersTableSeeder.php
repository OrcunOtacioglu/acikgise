<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Orçun',
            'surname' => 'Otacıoğlu',
            'is_admin' => true,
            'role_id' => 1,
            'email' => 'orcun.otacioglu@acikgise.com',
            'password' => bcrypt('CPGKhrs7V'),
            'phone' => '+905315718209',
            'citizenship' => 'Turkey',
            'identification_number' => '23140475804',
            'address' => 'Büyükdere Cad. No:123 Özsezen İş Merkezi C Blok Kat:8',
            'zip_code' => '34394',
            'province' => 'İstanbul',
            'country' => 'Turkey',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}