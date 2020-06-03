<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Supplier;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class ComponentController extends Controller
{
    private $table = "components";
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
        $components = Component::with('suppliers')->get();

        return $components;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $component = Component::create([
            'name' => $request->name,
            'description' => $request->description,
            'component_type_id' => $request->component_type_id,
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un composant",
            "table" => $this->table,
        ]);

        return $component;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
        return $component->with('suppliers')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Component $component)
    {
        $component->name = $request->name;
        $component->description = $request->description;
        $component->component_type_id = $request->component_type_id;
        $component->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un composant",
            "table" => $this->table,
        ]);

        return $component;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Component $component)
    {
        $component->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un composant",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Component successfully deleted"
        ], 200);
    }

    public function componentType(Component $component)
    {
        $componentType = $component->componentType;

        return $componentType;
    }

    public function addSupplier(Request $request, Component $component)
    {
        $supplier = Supplier::find($request->supplier_id);

        $component->suppliers()->attach($supplier);

        return $component->suppliers;
    }
}
