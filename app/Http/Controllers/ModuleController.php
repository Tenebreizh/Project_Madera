<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Module;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class ModuleController extends Controller
{
    private $table = "modules";
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
        $modules = Module::with('components')->get();

        return $modules;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = Module::create([
            'range_id' => $request->range_id,
            'name' => $request->name,
            'description' => $request->description,
            'principal_cut' => $request->principal_cut,
            'cctp' => $request->cctp,
            'marge' => $request->marge,
            'labor_time' => $request->labor_time,
            'price' => $request->price,
            'marge_enterprise' => $request->marge_enterprise
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un module",
            "table" => $this->table,
        ]);

        return $module;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return $module;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module->range_id = $request->range_id;
        $module->name = $request->name;
        $module->description = $request->description;
        $module->principal_cut = $request->principal_cut;
        $module->cctp = $request->cctp;
        $module->marge = $request->marge;
        $module->labor_time = $request->labor_time;
        $module->price = $request->price;
        $module->marge_enterprise = $request->marge_enterprise;
        $module->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un module",
            "table" => $this->table,
        ]);

        return $module;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Module $module)
    {
        $module->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un module",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Module successfully deleted"
        ], 
        200);
    }

    public function getComponents(Module $module)
    {
        return $module->components;
    }

    public function addComponent(Request $request, Module $module)
    {
        $component = Component::find($request->component_id);

        $module->components()->attach($component);

        return $module->components;
    }

    public function deleteComponent(Request $request, Module $module)
    {
        // $component = Component::find($request->component_id);

        // $module->components()->detach($request->component_id);

        return $module->components;
    }
}
