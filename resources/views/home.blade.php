@extends('admins.app')
<style>
        .kanban-container {
        display: flex;
        gap: 20px;
    }

    .kanban-column {
        flex: 1;
        background-color: #f4f4f4;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .kanban-task {
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        cursor: grab;
        transition: transform 0.2s ease-in-out;
    }

    .kanban-task:hover {
        transform: scale(1.05);
    }

    .kanban-column h2 {
        margin-bottom: 15px;
        font-size: 18px;
    }

    .task-todo {
        background-color: #3399FF; /* Bleu pour les tâches à faire */
    }

    .task-in-progress {
        background-color: #FFFF00; /* Jaune pour les tâches en cours */
    }

    .task-done {
        background-color: #00CC66; /* Vert pour les tâches terminées */
    }

    .task-suspended {
        background-color: #FF3300; /* Rouge pour les tâches suspendues */
    }

    .column-header {
    background-color: #f4f4f4;
    padding: 10px;
    border-radius: 5px 5px 0 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1;
    user-drag: none;
    user-select: none;
    }

    .column-header h2 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{\App\Models\User::all()->count()}}</h3>
                    <p>Utilisateurs </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('admins.utilisateurs')}}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\Projet::all()->count()}}</h3>
                    <p>Projets</p>
                </div>
                <div class="icon">
                    <i class="ion-stats-bars"></i>
                </div>
                <a href="{{route('projets')}}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

</div>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                A faire
            </h3>
        </div>

        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach ($tasksData as $data)
                    @if ($data['task']->statut == 'En attente' || $data['task']->statut == 'En cours')
                        <li>
                            <span class="handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <span class="text">{{ $data['task']->nomTache }}</span>

                            <div class="tools">
                                <small class="badge badge-info"><i class="far fa-clock"></i> {{ $data['timeRemaining'] }} jours</small>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</section>

<div class="kanban-container">
    <div class="kanban-column" id="todo-column">
        <div class="column-header">
            <h2>En attente</h2>
        </div>
        @foreach ($tasksToDo as $task)
            <div class="kanban-task task-todo" data-task-id="{{ $task->id }}">
                {{ $task->nomTache }}
            </div>
        @endforeach
    </div>

    <div class="kanban-column" id="in-progress-column">
        <div class="column-header">
            <h2>En cours</h2>
        </div>
        @foreach ($tasksInProgress as $task)
            <div class="kanban-task task-in-progress" data-task-id="{{ $task->id }}">
                {{ $task->nomTache }}
            </div>
        @endforeach
    </div>

    <div class="kanban-column" id="done-column">
        <div class="column-header">
            <h2>Terminé</h2>
        </div>
        @foreach ($tasksDone as $task)
            <div class="kanban-task task-done" data-task-id="{{ $task->id }}">
                {{ $task->nomTache }}
            </div>
        @endforeach
    </div>

    <div class="kanban-column" id="suspended-column">
        <div class="column-header">
            <h2>Suspendu</h2>
        </div>
        @foreach ($tasksSuspended as $task)
            <div class="kanban-task task-suspended" data-task-id="{{ $task->id }}">
                {{ $task->nomTache }}
            </div>
        @endforeach
    </div>
</div>

<form id="update-task-status-form" action="" method="POST" style="display: none;">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" id="task-status-input">
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    const columns = document.querySelectorAll('.kanban-column');

    columns.forEach(column => {
        new Sortable(column, {
            group: 'kanban',
            animation: 150,
            onEnd: function (evt) {
                const taskElement = evt.item; // L'élément de la tâche déplacée
                const columnElement = evt.to; // La colonne de destination

                // Retirez toutes les classes de statut de la tâche
                taskElement.classList.remove('task-todo', 'task-in-progress', 'task-done', 'task-suspended');

                // Ajoutez la classe de statut en fonction de la colonne de destination
                if (columnElement.id === 'todo-column') {
                    taskElement.classList.add('task-todo');
                    var newStatus = 'En attente';
                } else if (columnElement.id === 'in-progress-column') {
                    taskElement.classList.add('task-in-progress');
                    var newStatus = 'En cours';
                } else if (columnElement.id === 'done-column') {
                    taskElement.classList.add('task-done');
                    var newStatus = 'Terminée';
                } else if (columnElement.id === 'suspended-column') {
                    taskElement.classList.add('task-suspended');
                    var newStatus = 'Suspendu';
                }

                const taskId = taskElement.dataset.taskId;

                // Envoyez une requête AJAX ou utilisez une autre méthode pour mettre à jour le statut de la tâche dans la base de données
                fetch(`/taches/update-task-status/${taskId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        status: newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Réussite de la mise à jour, faites ce que vous souhaitez
                })
                .catch(error => {
                    console.error('Une erreur s\'est produite lors de la mise à jour du statut de la tâche : ', error);
                });
            }
        });
    });
</script>
@endsection
