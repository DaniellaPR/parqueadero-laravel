<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::whereNull('salida_at')->orderByDesc('created_at')->get(); //están adentro
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|max:10',
            'tipo'  => 'required|max:20',
            'propietario' => 'nullable|max:100',
            'observaciones' => 'nullable',
        ]);

        Vehiculo::create($request->all()); // created_at se pone solo

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo registrado (entrada).');
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo) //edita
    {
        $request->validate([
            'placa' => 'required|max:10',
            'tipo'  => 'required|max:20',
            'propietario' => 'nullable|max:100',
            'observaciones' => 'nullable',
        ]);

        $vehiculo->update($request->all());
        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado.');
    }

    //para registrar salida, no borrar
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->update(['salida_at' => now()]);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Salida registrada.');
    }
}
