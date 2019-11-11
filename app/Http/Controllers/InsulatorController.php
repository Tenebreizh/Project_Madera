<?php

namespace App\Http\Controllers;

use App\Models\Insulator;
use Illuminate\Http\Request;

class InsulatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insulators = Insulator::all();

        return $insulators;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insulator = Insulator::create([
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference
        ]);
            
        return $insulator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insulator  $insulator
     * @return \Illuminate\Http\Response
     */
    public function show(Insulator $insulator)
    {
        return $insulator;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insulator  $insulator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insulator $insulator)
    {
        $insulator->label = $request->label;
        $insulator->description = $request->description;
        $insulator->reference = $request->reference;

        $insulator->save();

        return $insulator;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insulator  $insulator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insulator $insulator)
    {
        $insulator->delete();

        return response()->json([
                "message" => "Insulator successfully deleted"
            ], 
            200);
    }
}
