@extends('layouts.app')

@section('titulo', 'Vehículos adentro')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Vehículos adentro</h1>
        <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">Nuevo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Placa</th>
                <th>Tipo</th>
                <th>Propietario</th>
                <th>Ingreso</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->tipo }}</td>
                    <td>{{ $vehiculo->propietario ?? '-' }}</td>
                    <td>{{ $vehiculo->created_at->format('d/m/Y H:i') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Registrar salida de este vehículo?')">
                                Salida
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No hay vehículos adentro.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
