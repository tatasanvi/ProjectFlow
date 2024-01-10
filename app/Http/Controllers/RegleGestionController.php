<?php

namespace App\Http\Controllers;

use App\Models\RegleGestion;
use App\Models\TypeProjet;
use Illuminate\Http\Request;

class RegleGestionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $regle_gestions = RegleGestion::all();
        return view('admins.regle_gestions', compact('regle_gestions'));
    }

    public function create() {
        $type_projets = TypeProjet::all();
        return view('admins.createRegleGestions',compact('type_projets'));
    }

    public function store(Request $request){
        $regle_gestion = new RegleGestion();
        $regle_gestion->type_projets_id = $request->type_projets_id;
        $regle_gestion->name = $request->name;
        $regle_gestion->description = $request->description;
        $regle_gestion->save();

        return redirect('/regle_gestions')->with("success", "Regle de gestion ajoutée avec succès!");
    }

    public function edit(RegleGestion $regle_gestion) {
        $type_projets = TypeProjet::all();
        return view('admins.editRegleGestion', compact('type_projets', 'regle_gestion'));
    }

    public function update(Request $request,$regle_gestion){
        $type_projets_id = $request->input('type_projets_id');
        $name = $request->input('name');
        $description = $request->input('description');

        RegleGestion::where('id',$regle_gestion)->update(array('type_projets_id' => $type_projets_id));
        RegleGestion::where('id',$regle_gestion)->update(array('name' => $name));
        RegleGestion::where('id',$regle_gestion)->update(array('description' => $description));

        return redirect('/regle_gestions')->with("success", "Regle de gestion mise à jour avec succès!");
    }

    public function delete(RegleGestion $regle_gestion){
        $nom = $regle_gestion->name;
        $regle_gestion->delete();
        return back()->with("successDelete", "La regle de gestion nommée '$nom' est supprimée avec succès!");
    }
}
