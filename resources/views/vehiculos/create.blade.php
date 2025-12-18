@extends('layouts.app')

@section('titulo', 'Nuevo Vehículo')

@section('contenido')
    <h1 class="h3">Registrar entrada</h1>

    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Placa *</label>
            <input type="text" name="placa" class="form-control" required value="{{ old('placa') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo *</label>
            <select name="tipo" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="Automóvil" {{ old('tipo')=='Automóvil'?'selected':'' }}>Automóvil</option>
                <option value="Motocicleta" {{ old('tipo')=='Motocicleta'?'selected':'' }}>Motocicleta</option>
                <option value="Camioneta" {{ old('tipo')=='Camioneta'?'selected':'' }}>Camioneta</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Propietario</label>
            <input type="text" name="propietario" class="form-control" value="{{ old('propietario') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones') }}</textarea>
        </div>

        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
