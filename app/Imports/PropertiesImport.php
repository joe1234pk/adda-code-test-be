<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use \App\Models\Property;

class PropertiesImport implements OnEachRow
{
    /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        
        if($rowIndex > 1){
            $property = Property::firstOrCreate([
                'id' => $row[0],
                'suburb' => $row[1],
                'state' => $row[2],
                'country' => $row[3],
            ]);
        }else{
            return null;
        }
       
    
    }
}
