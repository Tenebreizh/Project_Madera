<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Component;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
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

        return $module;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();

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
