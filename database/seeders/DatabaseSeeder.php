<?php

namespace Database\Seeders;

use App\Models\cards;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Mohamad Murad',
            'username' => 'mhd',
            'password' => Hash::make('12345678'),
            'isAdmin' => 1,
        ]);

        $FirstStart = 1231181;
        $FirstEnd = 1231300;

        for ($i =  $FirstStart ; $i <= $FirstEnd ; $i++){
            cards::create([
                'barcode' => $i,
                'balance' =>  50000,

            ]);
        }


        $SecondStart = 1231301;
        $SecondEnd = 1231500;

        for ($j =  $SecondStart ; $j <= $SecondEnd ; $j++){
            cards::create([
                'barcode' => $j,
                'balance' =>  25000,
            ]);
        }
    }
}
