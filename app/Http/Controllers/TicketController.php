<?php

namespace App\Http\Controllers;

use App\Models\Actualizacion;
use App\Models\Imagenes;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        /* $var= DB::select('select * from ticket where idTicket = ?', [1]); */

        $tickets = Ticket::paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ticket = new Ticket();
        $ticket->idEquipo = $request->idEquipo;
        $ticket->TipoEquipo = $request->TipoEquipo;
        $ticket->Marca = $request->Marca;
        $ticket->Modelo = $request->Modelo;
        $ticket->NoSerie = $request->NoSerie;
        $ticket->Color = $request->Color;
        $ticket->Caracteristicas = $request->Caracteristicas;
        $ticket->FechaEnvio = $request->FechaEnvio;
        $ticket->Problema = $request->Problema;

        //datos obtenidos por la BD
        $ticket->Region = 'por mientras';
        $ticket->Oficina = 'por mientras';
        $ticket->Usuario = 'por mientras';

        //predeterminado hasta que se empiece su proceso
        $ticket->Estado = 'Pendiente';

        $rutas = [];

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $imageName = time() . '-' . $imagen->getClientOriginalName();
                $imagen->move(public_path('uploads'), $imageName);
                $rutas[] = 'uploads/' . $imageName;
            }
        }

        //guardar imagenes

        $ticket->save();

        foreach ($rutas as $ruta) {
            # code...
            $imagenes = new Imagenes();
            $imagenes->idTicket = $ticket->idTicket;
            $imagenes->imagen = $ruta;
            $imagenes->save();
        }

        //en caso de querer que se redirija al ticket creado
        /* return redirect()->route('tickets.show', ['id' => $ticket->idTicket]); */
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $id)
    {
        //

        /* $actualizaciones=DB::select('select * from actualizaciones where idTicket = ?', [$id->idTicket]); */
        $actualizaciones = Actualizacion::where('idTicket', '=', $id->idTicket)->paginate(6);
        return view('tickets.show', ['ticket' => $id], compact('actualizaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
    public function filtro($filtro)
    {
        switch ($filtro) {
            case 'ascendente':
                # code...
                $tickets = Ticket::orderBy('fechaCreacion', 'asc')->paginate(10);
                return view('tickets.index', compact('tickets'));
            case 'descendente':
                # code...
                $tickets = Ticket::orderBy('fechaCreacion', 'desc')->paginate(10);
                return view('tickets.index', compact('tickets'));
            case 'pendientes':
                # code...
                $tickets = Ticket::where('estado', 'pendiente')->paginate(10);
                return view('tickets.index', compact('tickets'));
            case 'enProceso':
                # code...
                $tickets = Ticket::where('estado', 'en proceso')->paginate(10);
                return view('tickets.index', compact('tickets'));
            case 'finalizado':
                # code...
                $tickets = Ticket::where('estado', 'finalizado')->paginate(10);
                return view('tickets.index', compact('tickets'));

            default:
                break;
        }
    }
}
