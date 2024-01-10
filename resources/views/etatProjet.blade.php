<!DOCTYPE html>
<html>
<head>
    <title>Rapport du Projet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .report-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #555;
        }

        h3 {
            color: #777;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h1>Rapport du Projet : {{ $project->nomProjet }}</h1>
        <p>Type de Projet : {{ $typeProjet->name }}</p>
        <p>Nom du Projet : {{ $project->nomProjet }}</p>
        <p>Chef du Projet : {{ $project->User['name'] }}</p>

        <h2>Informations sur les Tâches</h2>
        <p>Nombre total de tâches : {{ $totalTasks }}</p>
        <p>Nombre de tâches terminées : {{ $completedTasks }}</p>
        <p>Nombre de tâches incomplètes : {{ $incompleteTasks }}</p>

        <h3>Liste des Tâches :</h3>
        <ul>
            @foreach ($project->taches as $tache)
                <li>
                    <strong>Tâche : </strong>{{ $tache->nomTache }}<br>
                    <strong>Description : </strong>{{ $tache->description }}<br>
                    <strong>Date de début : </strong>{{ \Carbon\Carbon::parse($tache->dateDebut)->format('d/m/Y') }}<br>
                    <strong>Date de fin : </strong>{{ \Carbon\Carbon::parse($tache->dateFin)->format('d/m/Y') }}<br>
                    <strong>Statut : </strong>{{ $tache->statut }}<br>
                    <!-- Afficher les utilisateurs assignés à cette tâche -->
                    <strong>Utilisateurs assignés :</strong>
                    <ul>
                        @foreach ($tache->utilisateursAssignes as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

    </div>
</body>
</html>
