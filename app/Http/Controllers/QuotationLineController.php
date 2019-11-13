<?php

namespace App\Http\Controllers;

use App\Models\QuotationLine;
use Illuminate\Http\Request;

class QuotationLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotationLines = QuotationLine::all();

        return $quotationLines;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quotationLine = QuotationLine::create([
            'custom_module_id' => $request->custom_module_id,
            'quotation_id' => $request->quotation_id,
            'taxe_id' => $request->taxe_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return $quotationLine;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationLine  $quotationLine
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationLine $quotationLine)
    {
        return $quotationLine;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuotationLine  $quotationLine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuotationLine $quotationLine)
    {
        $quotationLine->custom_module_id = $request->custom_module_id;
        $quotationLine->quotation_id = $request->quotation_id;
        $quotationLine->taxe_id = $request->taxe_id;
        $quotationLine->name = $request->name;
        $quotationLine->description = $request->description;
        $quotationLine->price = $request->price;
        $quotationLine->quantity = $request->quantity;

        $quotationLine->save();

        return $quotationLine;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationLine  $quotationLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationLine $quotationLine)
    {
        $quotationLine->delete();

        return response()->json([
            "message" => "Quotation line successfully deleted"
        ], 200);
    }
}
