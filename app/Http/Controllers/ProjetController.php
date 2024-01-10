<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Tache;
use App\Models\TypeProjet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $projets = Projet::with('taches.utilisateursAssignes')->get();
        $projetIdsToUpdate = Tache::whereDate('dateDébut', '<=', Carbon::today())->pluck('projets_id')->unique();
        Projet::whereIn('id', $projetIdsToUpdate)->update(['statut' => 'En cours']);

        return view('admins.projets', compact('projets'));
    }

    public function create() {
        $type_projets = TypeProjet::all();
        return view('admins.createProjet', compact('type_projets'));
    }

    public function store(Request $request){
        $projet = new Projet();
        $projet->type_projets_id = $request->type_projets_id;
        $projet->nomProjet = $request->nomProjet;
        $projet->description = $request->description;
        $projet->dateDébut = $request->dateDébut;
        $projet->dateFin = $request->dateFin;
        $projet->statut = 'En attente';
        $projet->users_id = Auth::user()->id;
        $projet->save();

        return redirect('/projets')->with("success", "Projet créé avec succès!");
    }

    public function edit(Projet $projet) {
        $type_projets = TypeProjet::all();
        return view('admins.editProjet', compact('projet', 'type_projets'));
    }

    public function update(Request $request,$projet){

        $nomProjet = $request->input('nomProjet');
        $type_projets_id = $request->input('type_projets_id');
        $dateDébut = $request->input('dateDébut');
        $dateFin = $request->input('dateFin');
        $description = $request->input('description');

        Projet::where('id',$projet)->update(array('nomProjet' => $nomProjet));
        Projet::where('id',$projet)->update(array('type_projets_id' => $type_projets_id));
        Projet::where('id',$projet)->update(array('dateDébut' => $dateDébut));
        Projet::where('id',$projet)->update(array('dateFin' => $dateFin));
        Projet::where('id',$projet)->update(array('description' => $description));

        return redirect('/projets')->with("success", "Projet mis à jour avec succès!");
    }

    /* public function delete(Projet $projet){
        $nom = $projet->nomProjet;
        $projet->delete();
        return back()->with("successDelete", "Le projet nommé '$nom' est supprimé avec succès!");
    } */

    public function delete($projet)
    {
        $projets = Projet::findOrFail($projet);

        foreach ($projets->taches as $tache) {
            $tache->ligneTaches()->delete();

            foreach ($tache->piecesJointes as $pieceJointe) {
                $pieceJointe->delete();
            }

            $tache->delete();
        }

        $projets->delete();

        return redirect('/projets')->with("success", "Projet supprimé avec succès!");
    }
    public function details($projet){
        $projets = Projet::findOrFail($projet);
        $taches = $projets->taches()->with('utilisateursAssignes', 'piecesJointes')->get();
        //dd($taches);

        $totalTaches = $taches->count();
        $tachesTerminees = $taches->where('statut', 'Terminée')->count();
        $tachesNonTerminees = $totalTaches - $tachesTerminees;
        return view('admins.detailsProjet',compact('projets', 'taches', 'totalTaches', 'tachesTerminees', 'tachesNonTerminees'));
    }
}
