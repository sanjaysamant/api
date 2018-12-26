<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use App\Continent;

class ContinentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            
            $continents = Continent::get();//All continents

            return response($continents, 200);
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
        try{
            $data = $request->all();
            // $data = $request->validate( [
            //     'name'         => 'required|max:25',
            //     'status'       => 'required',
            //     ]);
            Continent::create($data);

            return response(["Continent created successfully"], 200);
        }
        catch(\Exception $e){

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
            
            $continent = Continent::find($id);

            return response($continent, 200);
        }catch(\Exception $e){

            return response([$e->getMessage()], 500);
        }
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
        try{

            $data = $request->all();
            // $data = $request->validate( [
            //     'name'         => 'required|max:200',
            //     'status'       => 'required',
            //     ]);
            Continent::where('id', $id)->update($data);

            return response(['message' => "Continent updated successfully"], 200);
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
}
