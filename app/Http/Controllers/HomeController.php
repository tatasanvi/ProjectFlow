<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $tasksAssigned = $user->taches;

        $tasksData = [];

        foreach ($tasksAssigned as $task) {
            $timeRemaining = Carbon::now()->diffInDays($task->dateFin, false);

            $tasksData[] = [
                'task' => $task,
                'timeRemaining' => $timeRemaining,
            ];
        }


        $tasksToDo = $tasksAssigned->where('statut', 'En attente');
        $tasksInProgress = $tasksAssigned->where('statut', 'En cours');
        $tasksDone = $tasksAssigned->where('statut', 'Terminée');
        $tasksSuspended = $tasksAssigned->where('statut', 'suspendu');

        return view('home', compact('tasksToDo', 'tasksInProgress', 'tasksDone', 'tasksSuspended', 'tasksData'));
    }
}
