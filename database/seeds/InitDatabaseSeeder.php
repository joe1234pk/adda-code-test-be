<?php

use Illuminate\Database\Seeder;
use \App\Imports\DataImport;

class InitDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        $data_default_file_path = storage_path('BackEndTest_TestData_v1.1.xlsx');
        $import = new DataImport();
        Excel::import($import, $data_default_file_path);

    }
}
