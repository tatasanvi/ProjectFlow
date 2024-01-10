<?php

namespace App\Http\Controllers;

use App\Models\TypeProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeProjetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $type_projets = TypeProjet::all();
        return view('admins.type_projets', compact('type_projets'));
    }

    public function create() {
        return view('admins.create_type_projet');
    }

    public function store(Request $request){
        $type_projet = new TypeProjet();
        $type_projet->name = $request->name;
        $type_projet->description = $request->description;
        $type_projet->users_id = Auth::user()->id;
        $type_projet->save();

        return redirect('/type_projets')->with("success", "Type de Projet ajouté avec succès!");
    }

    public function edit(TypeProjet $type_projet) {
        return view('admins.editTypeProjet', compact('type_projet'));
    }

    public function update(Request $request,$type_projet){
        $name = $request->input('name');
        $description = $request->input('description');

        TypeProjet::where('id',$type_projet)->update(array('name' => $name));
        TypeProjet::where('id',$type_projet)->update(array('description' => $description));

        return redirect('/type_projets')->with("success", "Type Projet mis à jour avec succès!");
    }

    public function delete(TypeProjet $type_projet){
        $nom = $type_projet->name;
        $type_projet->delete();
        return back()->with("successDelete", "Le type de projet nommé '$nom' est supprimé avec succès!");
    }
}
