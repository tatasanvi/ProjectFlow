<?php

namespace App\Http\Controllers;

use App\Models\Contrainte;
use App\Models\TypeProjet;
use Illuminate\Http\Request;

class ContrainteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $contraintes = Contrainte::all();
        return view('admins.contraintes', compact('contraintes'));
    }

    public function create() {
        $type_projets = TypeProjet::all();
        return view('admins.createContrainte',compact('type_projets'));
    }

    public function store(Request $request){
        $contrainte = new Contrainte();
        $contrainte->type_projets_id = $request->type_projets_id;
        $contrainte->name = $request->name;
        $contrainte->description = $request->description;
        $contrainte->statut = $request->statut;
        $contrainte->save();

        return redirect('/contraintes')->with("success", "Contrainte ajoutée avec succès!");
    }

    public function edit(contrainte $contrainte) {
        $type_projets = TypeProjet::all();
        return view('admins.editContrainte', compact('type_projets', 'contrainte'));
    }

    public function update(Request $request,$contrainte){
        $type_projets_id = $request->input('type_projets_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $statut = $request->input('statut');

        Contrainte::where('id',$contrainte)->update(array('type_projets_id' => $type_projets_id));
        Contrainte::where('id',$contrainte)->update(array('name' => $name));
        Contrainte::where('id',$contrainte)->update(array('description' => $description));
        Contrainte::where('id',$contrainte)->update(array('statut' => $statut));

        return redirect('/contraintes')->with("success", "Contrainte mise à jour avec succès!");
    }

    public function delete(Contrainte $contrainte){
        $nom = $contrainte->name;
        $contrainte->delete();
        return back()->with("successDelete", "La contrainte nommée '$nom' est supprimée avec succès!");
    }
}
