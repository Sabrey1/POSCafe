<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country =  Country::all();
        return response()->json($country);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'country_code'=> 'required',
        ]);

        $country = Country::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Country created successfully',
            'country' => $country
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country, $id)
    {
        $country = Country::find($id);
        return response()->json($country);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country, $id)
    {
        $country = Country::find($id);
        if(!$country){
            return response()->json([
                'success' => false,
                'message' => 'Country not found',
            ]);
        }
        else{
            $country->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Country updated successfully',
                'country' => $country
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country, $id)
    {
        $country = Country::find($id);
        if(!$country){
            return response()->json([
                'success' => false,
                'message' => 'Country not found',
            ]);
        }
        else{
            $country->delete();
            return response()->json([
                'success' => true,
                'message' => 'Country deleted successfully',
            ]);
        }

    }
}
