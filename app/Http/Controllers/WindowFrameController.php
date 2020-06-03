<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\WindowFrame;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class WindowFrameController extends Controller
{
    private $table = "window_frames";
    private $log;

    public function __construct(LogController $log)
    {
        $this->log = $log;
    }

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

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'une qualité d'huisserie",
            "table" => $this->table,
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

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'une qualité d'huisserie",
            "table" => $this->table,
        ]);

        return $windowFrame;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WindowFrame  $windowFrame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WindowFrame $windowFrame)
    {
        $windowFrame->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'une qualité d'huisserie",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Window frame successfully deleted"
        ], 
        200);
    }
}
