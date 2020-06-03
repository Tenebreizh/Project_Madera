<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::all();

        return $logs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        $log = Log::create([
            'user_id' => $data['user_id'],
            'action_id' => $data['action_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'table' => $data['table']
        ]);

        return $log;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        return $log;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        $log->user_id = $request->user_id;
        $log->action_id = $request->action_id;
        $log->name = $request->name;
        $log->description = $request->description;
        $log->table = $request->table;

        $log->save();

        return $log;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        $log->delete();

        return response()->json([
            "message" => "log successfully deleted"
        ], 
        200);
    }
}
