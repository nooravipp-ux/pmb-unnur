<?php

use Illuminate\Database\Seeder;
use App\pmb_fakultas;
use App\pmb_prodi;

class PmbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string = Str::random(5);
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(100, 999)
            . mt_rand(100, 999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        pmb_fakultas::create([
        'id_fakultas'  => $string,
        'nama_fakultas' => 'FAKULTAS TEKNIK',
        ]);
    }
}
