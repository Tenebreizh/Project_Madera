<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class SupplierController extends Controller
{
    private $table = "suppliers";
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
        $suppliers = Supplier::all();

        return $suppliers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = Supplier::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'street' => $request->street,
            'street_number' => $request->street_number,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'email' => $request->email
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un fournisseur",
            "table" => $this->table,
        ]);

        return $supplier;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return $supplier;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->firstname = $request->firstname;
        $supplier->lastname = $request->lastname;
        $supplier->street = $request->street;
        $supplier->street_number = $request->street_number;
        $supplier->zipcode = $request->zipcode;
        $supplier->city = $request->city;
        $supplier->country = $request->country;
        $supplier->phone = $request->phone;
        $supplier->fax = $request->fax;
        $supplier->email = $request->email;
        $supplier->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un fournisseur",
            "table" => $this->table,
        ]);

        return $supplier;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Supplier $supplier)
    {
        $supplier->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un fournisseur",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Supplier successfully deleted"
        ], 200);
    }
}
