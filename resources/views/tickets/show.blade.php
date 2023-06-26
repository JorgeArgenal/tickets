@extends('layouts.app')
@section('title','Actualizaciones de ticket')
@section('contentShowTickets')
    <div style="width: 30%">
        <h5>Fecha de creación: {{ date('d-m-Y', strtotime($ticket->fechaCreacion)) }}</h5>
        <h5>Región: {{ $ticket->Region }}</h5>
        <h5>Oficina: {{ $ticket->Oficina }}</h5>
        <h5>Usuario: {{ $ticket->Usuario }}</h5>
        <h5>Tipo de equipo: {{ $ticket->TipoEquipo }}</h5>
        <h5>Marca: {{ $ticket->Marca }}</h5>
        <h5>Modelo: {{ $ticket->Modelo }}</h5>
        <h5>No. Serie: {{ $ticket->NoSerie }}</h5>
        <h5>Color: {{ $ticket->Color }}</h5>
        <h5>Caracteristicas: {{ $ticket->Caracteristicas }}</h5>
        <h5>Fecha de envío: {{ $ticket->FechaEnvio }}</h5>
        <h5>Problema: {{ $ticket->Problema }}</h5>
        <h5>Estado: {{ $ticket->estado }}</h5>
    </div>
    <div id="actualizaciones">
        @foreach ($actualizaciones as $actualizacion)
            <ul>
                <div>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $actualizacion->fechaActualizacion }}</h5>
                            {{-- <h5 class="card-title">{{ date('d-m-Y'), strtotime($actualizacion->fechaActualizacion) }}</h5> --}}
                            <p class="card-text" id="descripcion">{{ $actualizacion->descripcion }}</p>
                            <input type="button" value="Ver" class="btn card-link"
                                onclick="verActualizacion({{ $ticket->idTicket }}, {{ $actualizacion->idActualizacion }})">
                        </div>
                    </div>
                </div>
            </ul>
        @endforeach
        <br><br><br>
        <div>
            {{ $actualizaciones->onEachSide(2)->links() }}
        </div>
    </div>
@endsection


<script>
    function verActualizacion(idTicket, idActualizacion) {
        var urlBase =
            "{{ route('actualizacion.show', ['id' => 'idTicketPlaceholder', 'idActualizacion' => 'idActualizacionPlaceholder']) }}";
        var urlCompleta = urlBase.replace('idTicketPlaceholder', idTicket).replace('idActualizacionPlaceholder',
            idActualizacion);
        console.log(urlCompleta);
        window.location.href = urlCompleta;
    }
</script>
