<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\TypeProjet;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $ressources = Ressource::all();
        return view('admins.ressources', compact('ressources'));
    }

    public function create() {
        $type_projets = TypeProjet::all();
        return view('admins.createRessource',compact('type_projets'));
    }

    public function store(Request $request){
        $ressource = new Ressource();
        $ressource->type_projets_id = $request->type_projets_id;
        $ressource->name = $request->name;
        $ressource->description = $request->description;
        $ressource->save();

        return redirect('/ressources')->with("success", "Ressource ajoutée avec succès!");
    }

    public function edit(Ressource $ressource) {
        $type_projets = TypeProjet::all();
        return view('admins.editRessource', compact('type_projets', 'ressource'));
    }

    public function update(Request $request,$ressource){
        $type_projets_id = $request->input('type_projets_id');
        $name = $request->input('name');
        $description = $request->input('description');

        Ressource::where('id',$ressource)->update(array('type_projets_id' => $type_projets_id));
        Ressource::where('id',$ressource)->update(array('name' => $name));
        Ressource::where('id',$ressource)->update(array('description' => $description));

        return redirect('/ressources')->with("success", "Ressource mise à jour avec succès!");
    }

    public function delete(Ressource $ressource){
        $nom = $ressource->name;
        $ressource->delete();
        return back()->with("successDelete", "La ressource nommée '$nom' est supprimée avec succès!");
    }
}
