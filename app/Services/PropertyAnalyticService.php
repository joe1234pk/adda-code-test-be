<?php 

namespace App\Services;
use App\Models\PropertyAnalytic;
use Illuminate\Support\Arr;

class PropertyAnalyticService{

    public function createPropertyAnalytic($array) {
        $msg = '';
        $entity = ''; 
        try{
            $entity = PropertyAnalytic::create($array);
        } 
        catch(\Exception $e){
            $msg = $e->getMessage();
            \Log::error('CREATE PROPERTY ANALYTIC ERROR:'. $msg);
        }
        if($entity){
            return $entity;
        }
        return false;
    }

    public function updatePropertyAnalytic($id,$array) {
        $msg = '';
        $update = 0;
        $entity = PropertyAnalytic::findOrFail($id);
       
        try{
            $update = $entity->save($array);
        } 
        catch(\Exception $e){
            $msg = $e->getMessage();
            \Log::error('UPDATE PROPERTY ANALYTIC ERROR:'. $msg);
        }
        
        if($update){
            return $entity;
        }
        return false;
    }


}
