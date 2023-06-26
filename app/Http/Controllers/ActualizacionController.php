<?php

namespace App\Http\Controllers;

use App\Models\Actualizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActualizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('actualizaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($idActualizacion)
    {
        //
        $actualizacion = DB::select('select * from actualizaciones where idActualizacion = ?', [$idActualizacion]);
        //le paso el [0] porque al ser select * lo crea de forma predeterminada como un array, pero solo ocupo 1 porque solo debe de haber
        return view('actualizaciones.show', ['actualizacion' => $actualizacion[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actualizacion $actualizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actualizacion $actualizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actualizacion $actualizacion)
    {
        //
    }
}
