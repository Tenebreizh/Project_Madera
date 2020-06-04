<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Action;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LogController;

class UserController extends Controller
{
    private $table = "users";
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
        $users = User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'password' => Hash::make($request->password),
            'user_type_id' => $request->user_type_id
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un utilisateur",
            "table" => $this->table,
        ]);

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->password = Hash::make($request->password);
        $user->user_type_id = $request->user_type_id;
        $user->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un utilisateur",
            "table" => $this->table,
        ]);

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un utilisateur",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "User successfully deleted"
        ], 
        200);
    }

    public function deleteLogs(User $user)
    {
        $user->logs()->delete();

        return response()->json([
            "message" => "Every logs of this user has been successfully deleted"
        ], 
        200);
    }

    public function quotations(User $user)
    {
        $projects = $user->projects;

        $quotations = [];

        foreach ($projects as $project) {
            if (count($project->quotations)) {
                $quotations[] = $project->quotations[0];
            }
        }

        return $quotations;
    }
}
