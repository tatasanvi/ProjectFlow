<?php

namespace App\Http\Controllers;

use App\Models\PieceJointe;
use App\Models\Tache;
use App\Models\TypeProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PieceJointeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $piece_jointes = PieceJointe::all();
        return view('admins.piece_jointes', compact('piece_jointes'));
    }

    public function create() {
        $taches = Tache::all();
        return view('admins.createPieceJointe',compact('taches'));
    }


    public function store(Request $request)
    {
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $s = $file->getSize();
            $originalFileName = $file->getClientOriginalName();
            $path = public_path('dossiers_pieces_jointes/' . str_replace(' ', '-', $originalFileName));

            $file->move('dossiers_pieces_jointes', str_replace(' ', '-', $originalFileName));

            $piece_jointe = new PieceJointe();
            $piece_jointe->taches_id = $request->taches_id;
            $piece_jointe->filename = $originalFileName;
            $size = $s;
            $sizeInKilobytes = $size / 1024;
            $sizeInMegabytes = $sizeInKilobytes / 1024;
            $piece_jointe->file_size = $sizeInMegabytes;
            $piece_jointe->file_path = 'dossiers_pieces_jointes/' . str_replace(' ', '-', $originalFileName);
            $piece_jointe->save();
        }

        return redirect('/piece_jointes')->with("success", "Piece jointe ajoutée avec succès!");
    }


    public function edit(PieceJointe $piece_jointe) {
        $taches = Tache::all();
        return view('admins.editPieceJointe', compact('taches', 'piece_jointe'));
    }

    public function update(Request $request,$piece_jointe){
        $taches_id = $request->input('taches_id');

        if ($request->hasFile('file_path')){
            $file = $request->file('file_path');
            $originalFileName = $file->getClientOriginalName();
            $path = $file->storeAs('public/dossiers_pieces_jointes', str_replace(' ', '-', $originalFileName));
            $path2 = str_replace('public/', '', $path);
            $url = url('storage/' . $path2);
            $size = $file->getSize();
            $sizeInKilobytes = $size / 1024;
            $sizeInMegabytes = $sizeInKilobytes / 1024;
            PieceJointe::where('id',$piece_jointe)->update(array('taches_id' => $taches_id));
            PieceJointe::where('id',$piece_jointe)->update(array('filename' => $originalFileName));
            PieceJointe::where('id',$piece_jointe)->update(array('file_size' => $sizeInMegabytes));
            PieceJointe::where('id',$piece_jointe)->update(array('file_path' => $url));
        } else {
            PieceJointe::where('id',$piece_jointe)->update(array('taches_id' => $taches_id));
        }

        return redirect('/piece_jointes')->with("success", "piece_jointe mise à jour avec succès!");
    }

    public function delete(PieceJointe $piece_jointe){
        $nom = $piece_jointe->filename;
        $piece_jointe->delete();
        return back()->with("successDelete", "La piece jointe nommée '$nom' est supprimée avec succès!");
    }
}
