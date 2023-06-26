@extends('layouts.app')

@section('content')
    <div>
        Filtrar por fecha:
        <input type="button" value="ascendente" class="btn btn-link border" onclick="filtro('ascendente')">
        <input type="button" value="descendente" class="btn btn-link border" onclick="filtro('descendente')">
    </div>
    <table class="table">
        {{-- salto de fila --}}
        <tr class="tr">
            {{-- encabezado --}}
            <th>Id</th>
            <th>Fecha de creación</th>
            <th>Region</th>
            <th>Oficina</th>
            <th>Usuario</th>
            <th>Tipo de equipo</th>
            <th>Fecha de envio</th>
            <th>Problema</th>
            <th>estado</th>
            <th>Acciones</th>

        </tr>
        {{-- datos --}}
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->idTicket }}</td>
                <td>{{ $ticket->fechaCreacion }}</td>
                <td>{{ $ticket->Region }}</td>
                <td>{{ $ticket->Oficina }}</td>
                <td>{{ $ticket->Usuario }}</td>
                <td>{{ $ticket->TipoEquipo }}</td>
                <td>{{ $ticket->FechaEnvio }}</td>
                <td>
                    <div id="problemaIndex">
                        {{ $ticket->Problema }}
                    </div>
                </td>
                <td>{{ $ticket->estado }}</td>
                <td>
                    <div>
                        <input type="button" value="Actualizaciones" onclick="actualizar({{ $ticket->idTicket }})" class="btn border">
                    </div>
                </td>
        @endforeach
        </tr>
    </table>
    {{ $tickets->links() }}
@endsection


<script>
    function actualizar(id) {
        window.location.href = "{{ route('tickets.show', '') }}/" + id;
    }
    function filtro(filtro) {
        window.location.href = "{{ route('tickets.index','')}}/"+filtro;
    }
</script>
