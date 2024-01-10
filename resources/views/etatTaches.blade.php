<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .status-en-attente {
        color: #3498db;
    }

    .status-en-cours {
        color: #f39c12;
    }

    .status-terminee {
        color: #27ae60;
    }

    .status-suspendu {
        color: #e74c3c;
    }

    .users {
        font-style: italic;
    }
</style>
<h1 style="text-align: center;"><b>ETAT DES TACHES</b></h1>
<table>
    <thead>
        <tr>
            <th>Nom de la tâche</th>
            <th>Description</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Statut</th>
            <th>Utilisateurs assignés</th>
            <th>Projet</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($taches as $tache)
            <tr>
                <td>{{ $tache->nomTache }}</td>
                <td>{{ $tache->description }}</td>
                <td>{{ \Carbon\Carbon::parse($tache->dateDebut)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($tache->dateFin)->format('d/m/Y') }}</td>
                <td>
                    <span class="status-{{ strtolower($tache->statut) }}">{{ $tache->statut }}</span>
                </td>
                <td class="users">
                    @foreach ($tache->utilisateursAssignes as $utilisateur)
                        {{ $utilisateur->name }},
                    @endforeach
                </td>
                <td>{{ $tache->projet->nomProjet }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
