<?php

namespace App\Http\Controllers\Decideur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contrainte;

class ContrainteController extends Controller
{
    public function index()
    {
        $contraintes = Contrainte::all();
        return view('decideur.contraintes.index', compact('contraintes'));
    }

    public function create()
    {
        return view('decideur.contraintes.create');
    }

    public function store(Request $request)
    {
        // Valider les données reçues du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|string|max:255',
        ]);

        // Créer une nouvelle contrainte
        Contrainte::create($validatedData);

        return redirect()->route('decideur.contraintes.index')
            ->with('success', 'Contrainte créée avec succès.');
    }

    // Les autres méthodes pour afficher, éditer et supprimer une contrainte


    public function show($id)
    {
        $contrainte = Contrainte::findOrFail($id);
        return view('decideur.contraintes.show', compact('contrainte'));
    }

    public function edit($id)
    {
        $contrainte = Contrainte::findOrFail($id);
        return view('decideur.contraintes.edit', compact('contrainte'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'statut' => 'required|string',
        ]);

        $contrainte = Contrainte::findOrFail($id);
        $contrainte->update($data);

        return redirect()->route('decideur.contraintes.show', $contrainte->id)
            ->with('success', 'Contrainte mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $contrainte = Contrainte::findOrFail($id);
        $contrainte->delete();

        return redirect()->route('decideur.contraintes.index')
            ->with('success', 'Contrainte supprimée avec succès.');
    }

    // Autres méthodes si nécessaire




}
