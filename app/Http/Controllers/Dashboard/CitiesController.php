<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use App\Continent;
use App\Country;
use App\City;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            
            $cities = City::with('country.continent')->get();//All cities

            return response($cities, 200);
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

            City::create($data);

            return response(["City created successfully"], 200);
        }catch(\Exception $e){

            return response([$e->getMessage()], 500);
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
            
            $city = City::with('country')->find($id);
            $city->continent_id = $city->country->continent_id;

            return response($city, 200);
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

            City::where('id', $id)->update($data);

            return response(["City updated successfully"], 200);
        }catch(\Exception $e){

            return response([$e->getMessage()], 500);
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

    /**
     *  [getCountries based on continent]
     *
     *  @method getCountries
     *
     *  @param  [type] $continent_id [description]
     *
     *  @return [type] [description]
     */
    
    public function getCountries($continent_id){

        try{

            $countries = Country::where('continent_id', $continent_id)->get(['id', 'name']);

            return response($countries, 200);
        }catch(\Exception $e){

            return response([$e->getMessage()], 500);
        }

    }
}
