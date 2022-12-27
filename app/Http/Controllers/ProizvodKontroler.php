<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ProizvodKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proizvodi = DB::table('proizvods')->get();


        return response()->json([
            'Proizvodi' => $proizvodi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function show(Proizvod $proizvod)
    {
        $p = DB::table('proizvods')->where('id', $proizvod->id)->first();


        return response()->json([
            'Proizvod' => $p
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function edit(Proizvod $proizvod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proizvod $proizvod)
    {

        $validator = Validator::make($request->all(), [
            'sifra' => 'required|string',
            'ime' => 'required|string',
            'cena' => 'required',
            'firma_id' => 'required|integer',
        ]);



        if ($validator->fails()) {

            return response()->json([
                'Poruka' => $validator->errors()
            ]);
        }


        $proizvod->sifra = $request->sifra;
        $proizvod->ime = $request->ime;
        $proizvod->cena = $request->cena;
        $proizvod->firma_id = $request->firma_id;
        $proizvod->save();


        return response()->json([
            'Poruka' => 'Proizvod je azuriran!'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proizvod  $proizvod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proizvod $proizvod)
    {
        DB::table('proizvods')->where('id', $proizvod->id)->delete();


        return response()->json([
            'Poruka' => 'Proizvod je obrisan!'
        ]);
    }
}
