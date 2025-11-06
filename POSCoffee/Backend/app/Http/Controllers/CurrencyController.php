<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curencies = Currency::all();
        return response()->json($curencies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'currency_code'=> 'required',
            'symbol'=> 'required',
        ]);

        $currency = Currency::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Currency created successfully',
            'currency' => $currency
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency, $id)
    {
        $currency = Currency::find($id);
        return response()->json( $currency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency, $id)
    {
        $currency = Currency::find($id);
        if(!$currency){
            return response()->json([
                'success' => false,
                'message' => 'Currency not found'
            ]);
        }
        else{
            $currency->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Currency updated successfully',
                'currency' => $currency
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency,$id)
    {
        $currency = Currency::find($id);
        if(!$currency){
            return response()->json([
                'success' => false,
                'message' => 'Currency not found',
                'currency' => $currency
            ]);
        }
        else{
            $currency->delete();
            return response()->json([
                'success' => true,
                'message' => 'Currency deleted successfully'
            ]);
        }
    }
}
