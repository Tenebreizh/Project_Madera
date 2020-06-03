<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class ProjectController extends Controller
{
    private $table = "projects";
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
        
        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un projet",
            "table" => $this->table,
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

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un projet",
            "table" => $this->table,
        ]);

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        $project->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un projet",
            "table" => $this->table,
        ]);

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
