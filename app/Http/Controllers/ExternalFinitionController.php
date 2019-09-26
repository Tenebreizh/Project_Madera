<?php

namespace App\Http\Controllers;

use App\Models\ExternalFinition;
use Illuminate\Http\Request;

class ExternalFinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $externalFinitions = ExternalFinition::all();

        return $externalFinitions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $externalFinition = ExternalFinition::create([
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference
        ]);
            
        return $externalFinition;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalFinition  $externalFinition
     * @return \Illuminate\Http\Response
     */
    public function show(ExternalFinition $externalFinition)
    {
        return $externalFinition;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternalFinition  $externalFinition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExternalFinition $externalFinition)
    {
        $externalFinition->label = $request->label;
        $externalFinition->description = $request->description;
        $externalFinition->reference = $request->reference;

        $externalFinition->save();

        return $externalFinition;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalFinition  $externalFinition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExternalFinition $externalFinition)
    {
        $externalFinition->delete();

        return response()->json([
                "message" => "External finition successfully deleted"
            ], 
            200);
    }
}
