<?php

namespace App\Imports;

// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DataImport implements WithMultipleSheets 
{
    /**
    * @param Collection $collection
    */
    
    public function sheets(): array
    {
        return [
            0 =>new PropertiesImport(),
            1 =>new AnalyticsImport(),
            2 =>new PropertyAnalyticsImport(),
        ];
    }
}
