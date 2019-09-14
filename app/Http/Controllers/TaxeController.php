<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use Illuminate\Http\Request;

class TaxeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Taxe::all();

        return $taxes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taxe = Taxe::create([
            'name' => $request->name,
            'description' => $request->description,
            'rate' => $request->rate,
        ]);
        
        return $taxe;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function show(Taxe $taxe)
    {
        return $taxe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxe $taxe)
    {
        $taxe->name = $request->name;
        $taxe->description = $request->description;
        $taxe->rate = $request->rate;
        $taxe->save();

        return $taxe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxe $taxe)
    {
        $taxe->delete();

        return response()->json([
            "message" => "Taxe successfully deleted"
        ], 200);
    }
}
