<?php

namespace App\Http\Controllers;

use App\Models\ComponentType;
use Illuminate\Http\Request;

class ComponentTypeController extends Controller
{
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

        return $componentType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComponentType  $componentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComponentType $componentType)
    {
        $componentType->delete();

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
