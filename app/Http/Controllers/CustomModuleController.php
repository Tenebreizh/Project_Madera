<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\CustomModule;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class CustomModuleController extends Controller
{
    private $table = "custom_modules";
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

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un module customisé",
            "table" => $this->table,
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

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un module customisé",
            "table" => $this->table,
        ]);

        return $customModule;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomModule  $customModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CustomModule $customModule)
    {
        $customModule->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un module customisé",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Custom module successfully deleted"
        ], 
        200);
    }
}
