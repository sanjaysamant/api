<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use App\Continent;
use App\Country;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            
            $countries = Country::with('continent')->get();//All countries

            return response($countries, 200);
        }catch(\Exception $e){

            return response([$e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // $data = $request->validate( [
        //     'name'         => 'required|max:25',
        //     'status'       => 'required',
        //     ]);
        try{

            $data['code'] = $request->code;
            $data['isd_code'] = $request->isd_code;
            $data['flag'] = $request->flag;
            $data['flag_path'] = $request->flag_path;
             // if(isset($request->flag) && !empty($request->flag)){

            //     $data['flag'] = $data['code'] . '.' . $request->flag->getClientOriginalExtension();
            //     $data['flag_path'] = 'images/countries/';
            //     $request->flag->move(public_path($data['flag_path']), $data['flag']);
            // }
            Country::create($data);

            return response(["Country created successfully"], 200);
        }catch(\Exception $e){

            return response([$e->getMessage() . "Line: " . $e->getLine()], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            
            $country = Country::find($id);

            return response($country, 200);
        }catch(\Exception $e){

            return response([$e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $data = $request->all();
        // $data = $request->validate( [
        //     'name'         => 'required|max:200',
        //     'status'       => 'required',
        //     ]);
        try{
            $data['code'] = $request->code;
            $data['isd_code'] = $request->isd_code;
            $data['flag'] = $request->flag;
            $data['flag_path'] = $request->flag_path;
            // if(isset($request->flag) && !empty($request->flag)){

            //     $data['flag'] = $data['code'] . '.' . $request->flag->getClientOriginalExtension();
            //     $data['flag_path'] = 'images/countries/';
            //     $request->flag->move(public_path($data['flag_path']), $data['flag']);
            // }
            Country::where('id', $id)->update($data);

            return response(["Country updated successfully"], 200);
        }catch(\Exception $e){

            return response([$e->getMessage() . "Line: " . $e->getLine()], 500);
        }
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

    /**
     *  [getAllContinents description]
     *
     *  @method getAllContinents
     *
     *  @return [type] [description]
     */
    
    public function getAllContinents(){

        try{

            $continents = Continent::get(['id', 'name']);

            return response($continents, 200);
        }catch(\Exception $e){

            return response([$e->getMessage()], 500);
        }
    }
}
