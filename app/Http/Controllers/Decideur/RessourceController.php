<?php

namespace App\Http\Controllers\Decideur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ressource;

class RessourceController extends Controller
{
  

    // Les méthodes create, store, edit, update, destroy, etc.
    public function index()
    {
        $ressources = Ressource::all();
        return view('decideur.ressources.index', compact('ressources'));
    }

    public function create()
    {
        return view('decideur.ressources.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Ressource::create($data);

        return redirect()->route('decideur.ressources.index')
            ->with('success', 'Ressource créée avec succès.');
    }

    public function show($id)
    {
        $ressource = Ressource::findOrFail($id);
        return view('decideur.ressources.show', compact('ressource'));
    }

    public function edit($id)
    {
        $ressource = Ressource::findOrFail($id);
        return view('decideur.ressources.edit', compact('ressource'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $ressource = Ressource::findOrFail($id);
        $ressource->update($data);

        return redirect()->route('decideur.ressources.show', $ressource->id)
            ->with('success', 'Ressource mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $ressource = Ressource::findOrFail($id);
        $ressource->delete();

        return redirect()->route('decideur.ressources.index')
            ->with('success', 'Ressource supprimée avec succès.');
    }

}
