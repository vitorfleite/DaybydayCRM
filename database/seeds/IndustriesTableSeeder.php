<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class IndustriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('industries')->delete();
        
        \DB::table('industries')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Motorista',
                'external_id' => Uuid::uuid4()
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Seguradora',
                'external_id' => Uuid::uuid4()
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Frotista',
                'external_id' => Uuid::uuid4()
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Concessionária',
                'external_id' => Uuid::uuid4()
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Montadora',
                'external_id' => Uuid::uuid4()
            ),
        ));
    }
}
