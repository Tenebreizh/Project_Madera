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

        return $customModule;
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
        $customModule->label = $request->label;
        $customModule->description = $request->description;
        $customModule->specification = $request->specification;
        $customModule->price = $request->price;
        $customModule->commercial_marge = $request->commercial_marge;

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
