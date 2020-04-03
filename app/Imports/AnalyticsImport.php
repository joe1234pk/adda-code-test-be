<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use \App\Models\AnalyticType;

class AnalyticsImport implements OnEachRow
{
    /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        
        if($rowIndex > 1){
            $property = AnalyticType::firstOrCreate([
                'id' => $row[0],
                'name' => $row[1],
                'units' => $row[2],
                'is_numeric' => $row[3],
                'num_decimal_places' => $row[4],
            ]);
        }else{
            return null;
        }
       
    
    }
}
