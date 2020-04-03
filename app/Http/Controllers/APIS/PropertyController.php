<?php

namespace App\Http\Controllers\APIS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\PropertyService;

class PropertyController extends Controller
{
    private $service = null;

    public function __construct(){
        $this->service = app(PropertyService::class);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'suburb' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' =>'Create failed','message' => $validator->errors()]);
        }

        $result = $this->service->createProperty($request->only(['id','guid','suburb','state','country']));

        if($result){
            return response()->json($result,201);
        }
            
         
        return response()->json(['error' =>'create fail']); 
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
       $result =  $this->service->showAnalyticsOfProperty($id);

       return response()->json($result);
    
    }

    public function getSuburbAnalyticsSummary($value){
        $attr = 'suburb';
        $value = ucfirst($value);
        return $this->service->getAnalyticsSummaryOf($attr,$value);
    }
    public function getStateAnalyticsSummary($value){
        $attr = 'state';
        $value = strtoupper($value);
        return $this->service->getAnalyticsSummaryOf($attr,$value);
    }
    public function getCountryAnalyticsSummary($value){
        $attr = 'country';
        $value = strtoupper($value);
        return $this->service->getAnalyticsSummaryOf($attr,$value);
    }

}
