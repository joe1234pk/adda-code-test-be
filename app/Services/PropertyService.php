<?php 

namespace App\Services;
use App\Models\Property;
use Illuminate\Support\Arr;
use DB;

class PropertyService{

    public function createProperty($array) {
        $msg = '';
        $entity = ''; 
        try{
            $entity = Property::create($array);
        } 
        catch(\Exception $e){
            $msg = $e->getMessage();
            \Log::error('CREATE PROPERTY ERROR:'. $msg);
        }
        if($entity){
            return $entity;
        }
        return false;
    }

    public function showAnalyticsOfProperty($id){
        $enitity = Property::with('analytics')->findOrFail($id);
        return $enitity;
    }

    public function getAnalyticsSummaryOf($key,$value){
        $query1 = "SELECT min(value) as min_val,max(value) as max_val, count(value)/count(*) as percentage_w_value, 1- count(value)/count(*) as percentage_wt_value from property_analytics
        WHERE property_id in (SELECT id FROM properties WHERE $key = \"$value\")";
        $query2= "SELECT AVG(median_table.value) as median_val
        FROM (
        SELECT property_analytics.value, @rownum:=@rownum+1 as `row_number`, @total_rows:= @rownum
          FROM  property_analytics, (SELECT @rownum:=0) r
          WHERE property_id in (SELECT id FROM properties WHERE $key = \"$value\") 
          AND value IS NOT NULL
          ORDER BY property_analytics.value
        ) as median_table
        WHERE median_table.row_number IN ( FLOOR((@total_rows+1)/2), FLOOR((@total_rows+2)/2) )";
        
        $result1 = (array)DB::select(DB::raw($query1))[0];
        $result2 = (array)DB::select(DB::raw($query2))[0];
        
        return Arr::collapse([$result1,$result2]);
    }

}
