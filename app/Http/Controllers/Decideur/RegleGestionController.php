<?php

namespace App\Http\Controllers\Decideur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegleGestion;

class RegleGestionController extends Controller
{
    public function index()
    {
        $regles = RegleGestion::all();
        return view('decideur.regles.index', compact('regles'));
    }

    public function create()
    {
        return view('decideur.regles.create');
    }

    public function store(Request $request)
    {
        // Valider les données reçues du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Créer une nouvelle règle de gestion
        RegleGestion::create($validatedData);

        return redirect()->route('decideur.regles.index')
            ->with('success', 'Règle de gestion créée avec succès.');
    }

    // Les autres méthodes pour afficher, éditer et supprimer une règle de gestion

    public function show($id)
    {
        $regleGestion = RegleGestion::findOrFail($id);
        return view('decideur.reglegestions.show', compact('regleGestion'));
    }

    public function edit($id)
    {
        $regleGestion = RegleGestion::findOrFail($id);
        return view('decideur.reglegestions.edit', compact('regleGestion'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $regleGestion = RegleGestion::findOrFail($id);
        $regleGestion->update($data);

        return redirect()->route('decideur.reglegestions.show', $regleGestion->id)
            ->with('success', 'Règle de gestion mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $regleGestion = RegleGestion::findOrFail($id);
        $regleGestion->delete();

        return redirect()->route('decideur.reglegestions.index')
            ->with('success', 'Règle de gestion supprimée avec succès.');
    }

    // Autres méthodes si nécessaire

}
