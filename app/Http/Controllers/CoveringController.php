<?php

namespace App\Http\Controllers;

use App\Models\Covering;
use Illuminate\Http\Request;

class CoveringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverings = Covering::all();

        return $coverings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $covering = Covering::create([
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference
        ]);
            
        return $covering;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Covering  $covering
     * @return \Illuminate\Http\Response
     */
    public function show(Covering $covering)
    {
        return $covering;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Covering  $covering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Covering $covering)
    {
        $covering->label = $request->label;
        $covering->description = $request->description;
        $covering->reference = $request->reference;

        $covering->save();

        return $covering;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Covering  $covering
     * @return \Illuminate\Http\Response
     */
    public function destroy(Covering $covering)
    {
        $covering->delete();

        return response()->json([
                "message" => "Covering successfully deleted"
            ], 
            200);
    }
}
