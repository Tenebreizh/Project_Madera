<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return $projects;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create([
            'client_id' => $request->client_id,
            'user_id' => $request->user_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'description' => $request->description,
            'reference' => $request->reference,
        ]);

        return $project;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return $project;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->client_id = $request->client_id;
        $project->user_id = $request->user_id;
        $project->state_id = $request->state_id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->reference = $request->reference;

        $project->save();

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json([
            "message" => "Project successfully deleted"
        ], 200);
    }

    /**
     * Get the project quotations specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function quotations(Project $project)
    {
        $quotations = $project->quotations;

        return $quotations;
    }
}
