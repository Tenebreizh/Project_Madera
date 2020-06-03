<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use App\Models\ComponentType;
use App\Http\Controllers\LogController;

class ComponentTypeController extends Controller
{
    private $table = "component_types";
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
        $componentTypes = ComponentType::all();

        return $componentTypes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = ComponentType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'une famille de composant",
            "table" => $this->table,
        ]);

        return $type;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComponentType  $componentType
     * @return \Illuminate\Http\Response
     */
    public function show(ComponentType $componentType)
    {
        return $componentType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComponentType  $componentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComponentType $componentType)
    {
        $componentType->name = $request->name;
        $componentType->description = $request->description;
        $componentType->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'une famille de composant",
            "table" => $this->table,
        ]);

        return $componentType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComponentType  $componentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ComponentType $componentType)
    {
        $componentType->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'une famille de composant",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Component type successfully deleted"
        ], 200);
    }

    public function components(ComponentType $componentType)
    {
        $components = $componentType->components;

        return $components;
    }
}
