@extends('layouts.app')

@section('titulo', 'Editar Vehículo')

@section('contenido')
    <h1 class="h3">Editar vehículo</h1>

    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Placa *</label>
            <input type="text" name="placa" class="form-control" required
                   value="{{ old('placa', $vehiculo->placa) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo *</label>
            <select name="tipo" class="form-select" required>
                @foreach(['Automóvil','Motocicleta','Camioneta'] as $t)
                    <option value="{{ $t }}" {{ old('tipo', $vehiculo->tipo)==$t?'selected':'' }}>
                        {{ $t }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Propietario</label>
            <input type="text" name="propietario" class="form-control"
                   value="{{ old('propietario', $vehiculo->propietario) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones', $vehiculo->observaciones) }}</textarea>
        </div>

        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
