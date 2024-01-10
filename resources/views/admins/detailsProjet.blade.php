@extends("admins.app")
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Details du projet</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Tâches totales</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $totalTaches }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Tâches terminées</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $tachesTerminees }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Tâches non terminées</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $tachesNonTerminees }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Tâches</h4>
                            @foreach ($taches as $tache)
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/tache.png" alt="Tache">
                                        <span class="username">
                                            <a href="#">{{ $tache->nomTache }}</a>
                                        </span>
                                        <span class="description">Du <b>{{ \Carbon\Carbon::parse($tache->dateDébut)->format('d/m/Y') }}</b> au <b>{{ \Carbon\Carbon::parse($tache->dateFin)->format('d/m/Y') }}</b></span>&nbsp;&nbsp;&nbsp;<label class="badge badge-primary">{{ $tache->statut }}</label>
                                    </div>

                                    <p>
                                        {{ $tache->description }}
                                    </p>
                                    <p>
                                        <h6>Utilisateurs assignés :</h6>
                                        <ul>
                                            @foreach ($tache->utilisateursAssignes as $utilisateur)
                                                <li><label class="badge badge-dark">{{ $utilisateur->name }}</label></li>
                                            @endforeach
                                        </ul>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-project-diagram"></i> {{ $projets->nomProjet }}</h3>
                    <span class="description">Du <b>{{ \Carbon\Carbon::parse($projets->dateDébut)->format('d/m/Y') }}</b> au <b>{{ \Carbon\Carbon::parse($projets->dateFin)->format('d/m/Y') }}</b></span>
                    <p class="text-muted">{{ $projets->description }}</p>
                    <br>
                    <h5 class="mt-5 text-muted">Fichiers du projet</h5>
                    <ul class="list-unstyled">
                        @foreach ($taches as $tache)
                            @foreach ($tache->piecesJointes as $pieceJointe)
                                <li>
                                    <a href="{{ asset($pieceJointe->file_path) }}" class="btn-link text-secondary" target="_blank"><i class="far fa-fw fa-file"></i>{{ $pieceJointe->filename }}</a>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
