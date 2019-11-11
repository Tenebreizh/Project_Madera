<?php

namespace App\Http\Controllers;

use App\Models\WindowFrame;
use Illuminate\Http\Request;

class WindowFrameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $windowFrames = WindowFrame::all();

        return $windowFrames;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $windowFrame = WindowFrame::create([
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference
        ]);
            
        return $windowFrame;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WindowFrame  $windowFrame
     * @return \Illuminate\Http\Response
     */
    public function show(WindowFrame $windowFrame)
    {
        return $windowFrame;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WindowFrame  $windowFrame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WindowFrame $windowFrame)
    {
        $windowFrame->label = $request->label;
        $windowFrame->description = $request->description;
        $windowFrame->reference = $request->reference;

        $windowFrame->save();

        return $windowFrame;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WindowFrame  $windowFrame
     * @return \Illuminate\Http\Response
     */
    public function destroy(WindowFrame $windowFrame)
    {
        $windowFrame->delete();

        return response()->json([
                "message" => "Window frame successfully deleted"
            ], 
            200);
    }
}
