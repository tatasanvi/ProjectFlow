<?php

namespace App\Http\Controllers\Decideur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeProjet;

class TypeProjetController extends Controller
{
    public function index()
    {
        $typesProjets = TypeProjet::all();
        return view('decideur.type_projets.index', compact('typesProjets'));
    }

    public function create()
    {
        return view('decideur.type_projets.create');
    }

    public function store(Request $request)
    {
        // Valider les données reçues du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Créer un nouveau type de projet
        TypeProjet::create($validatedData);

        return redirect()->route('decideur.type_projets.index')
            ->with('success', 'Type de projet créé avec succès.');
    }

    // Les autres méthodes pour afficher, éditer et supprimer un type de projet

    public function show($id)
    {
        $typeProjet = TypeProjet::findOrFail($id);
        return view('decideur.types_projets.show', compact('typeProjet'));
    }

    public function edit($id)
    {
        $typeProjet = TypeProjet::findOrFail($id);
        return view('decideur.types_projets.edit', compact('typeProjet'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $typeProjet = TypeProjet::findOrFail($id);
        $typeProjet->update($data);

        return redirect()->route('decideur.types_projets.show', $typeProjet->id)
            ->with('success', 'Type de projet mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $typeProjet = TypeProjet::findOrFail($id);
        $typeProjet->delete();

        return redirect()->route('decideur.types_projets.index')
            ->with('success', 'Type de projet supprimé avec succès.');
    }



}
