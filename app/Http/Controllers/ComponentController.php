<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
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
        return $component->with('suppliers')->get();
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

        return $component;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {
        $component->delete();

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
