<?php

namespace App\Http\Controllers;

use App\Models\Range;
use Illuminate\Http\Request;

class RangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranges = Range::all();

        return $ranges;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $range = Range::create([
            'covering_id' => $request->covering_id,
            'insulator_id' => $request->insulator_id,
            'external_finition_id' => $request->external_finition_id,
            'window_frame_id' => $request->window_frame_id,
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference,
            'rule' => $request->rule
        ]);

        return $range;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Range  $range
     * @return \Illuminate\Http\Response
     */
    public function show(Range $range)
    {
        return $range;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Range  $range
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Range $range)
    {
        $range->covering_id = $request->covering_id;
        $range->insulator_id = $request->insulator_id;
        $range->external_finition_id = $request->external_finition_id;
        $range->window_frame_id = $request->window_frame_id;
        $range->label = $request->label;
        $range->description = $request->description;
        $range->reference = $request->reference;
        $range->rule = $request->rule;

        $range->save();

        return $range;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Range  $range
     * @return \Illuminate\Http\Response
     */
    public function destroy(Range $range)
    {
        $range->delete();

        return response()->json([
            "message" => "Range successfully deleted"
        ], 
        200);
    }
}
