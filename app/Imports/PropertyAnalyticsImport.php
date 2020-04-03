<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use \App\Models\PropertyAnalytic;

class PropertyAnalyticsImport implements OnEachRow
{
    /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        
        if($rowIndex > 1){
            $property = PropertyAnalytic::firstOrCreate([
                'property_id' => $row[0],
                'analytic_type_id' => $row[1],
                'value' => $row[2],
            ]);
        }else{
            return null;
        }
       
    
    }
}
