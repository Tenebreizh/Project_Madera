<?php

namespace App\Http\Controllers;

use App\Models\CustomModule;
use Illuminate\Http\Request;

class CustomModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customModules = CustomModule::all();

        return $customModules;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customModule = CustomModule::create([
            'module_id' => $request->module_id,
            'label' => $request->label,
            'description' => $request->description,
            'specification' => $request->specification,
            'price' => $request->price,
            'commercial_marge' => $request->commercial_marge
        ]);

        return $module;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomModule  $customModule
     * @return \Illuminate\Http\Response
     */
    public function show(CustomModule $customModule)
    {
        return $customModule;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomModule  $customModule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomModule $customModule)
    {
        $customModule->range_id = $request->module_id;
        $customModule->name = $request->label;
        $customModule->description = $request->description;
        $customModule->principal_cut = $request->specification;
        $customModule->cctp = $request->price;
        $customModule->marge = $request->commercial_marge;

        $customModule->save();

        return $customModule;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomModule  $customModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomModule $customModule)
    {
        $customModule->delete();

        return response()->json([
            "message" => "Custom module successfully deleted"
        ], 
        200);
    }
}
