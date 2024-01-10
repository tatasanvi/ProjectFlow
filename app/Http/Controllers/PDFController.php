<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Tache;
use PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($projet)
    {

        $project = Projet::find($projet);
        $typeProjet = $project->typeProjet;
        $totalTasks = $project->taches->count();
        $completedTasks = $project->taches->where('statut', 'Terminée')->count();
        $incompleteTasks = $totalTasks - $completedTasks;

        $pdf = PDF::loadView('etatProjet', [
            'project' => $project,
            'typeProjet' => $typeProjet,
            'totalTasks' => $totalTasks,
            'completedTasks' => $completedTasks,
            'incompleteTasks' => $incompleteTasks,
        ]);

        return $pdf->download('PROJECTFLOW-EtatProjet.pdf');
    }

}
