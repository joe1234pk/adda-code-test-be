<?php

namespace App\Http\Controllers\APIS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\PropertyAnalyticService;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

class PropertyAnalyticController extends Controller
{
   
    public function __construct(){
        $this->service = app(PropertyAnalyticService::class);
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'property_id' => [
                'required',
                Rule::exists('properties','id'),
            ],
            'analytic_type_id' => [
                'required',
                Rule::exists('analytic_types','id'),
            ],
            'value' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' =>'Create failed','message' => $validator->errors()]);
        }
        $result = $this->service->createPropertyAnalytic($request->only(['id','property_id','analytic_type_id','value']));

        if($result){
            return response()->json($result,201);
        }
            
         
        return response()->json(['create error. check the input and try again']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'property_id' => [
                'required',
                Rule::exists('properties','id'),
            ],
            'analytic_type_id' => [
                'required',
                Rule::exists('analytic_types','id'),
            ],
            'value' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' =>'Update failed','message' => $validator->errors()]);
        }
        $result = $this->service->updatePropertyAnalytic($id,$request->only(['property_id','analytic_type_id','value']));

        if($result){
            return response()->json($result);
        }
            
         
        return response()->json(['Update error. check the input and try again']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
