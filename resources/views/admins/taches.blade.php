@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Liste des taches</b></h3>
        <div class="d-flex justify-content-end">
            <div>
                <a href="{{ route('etatTaches.print') }}" class="btn btn-success mb-3 ml-2">Etat des taches</a>
                <a href="{{ route('taches.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle tâche</a>
            </div>
        </div>
    </div>
    @if(session()->has("success"))
        <div class="alert alert-success" style="text-align: center !important;">
            <h6>{{session()->get('success')}}</h6>
        </div>
    @endif
    @if(session()->has("error"))
        <div class="alert alert-danger" style="text-align: center !important;">
            <h6>{{session()->get('error')}}</h6>
        </div>
    @endif
    @if(session()->has("successDelete"))
        <div class="alert alert-success" style="text-align: center !important;">
            <h6>{{session()->get('successDelete')}}</h6>
        </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Projet</th>
            <th scope="col">Nom Tache</th>
            <th scope="col">Description</th>
            <th scope="col">Date début</th>
            <th scope="col">Date fin</th>
            <th scope="col">Utilisateurs assignés</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($taches as $tache)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$tache->Projet['nomProjet']}}</td>
                <td>{{$tache->nomTache}}</td>
                <td>{{$tache->description}}</td>
                <td>{{ \Carbon\Carbon::parse($tache->dateDébut)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($tache->dateFin)->format('d/m/Y') }}</td>
                <td>
                    @foreach ($tache->ligneTaches as $ligneTache)
                        <label class="badge badge-dark">{{ $ligneTache->User['name'] }}</label>
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </td>
                <td>
                    @php
                    $badgeClass = '';
                        switch ($tache->statut) {
                            case 'En attente':
                                $badgeClass = 'badge-primary';
                                break;
                            case 'En cours':
                                $badgeClass = 'badge-warning';
                                break;
                            case 'Terminée':
                                $badgeClass = 'badge-success';
                                break;
                            case 'Suspendu':
                                $badgeClass = 'badge-danger';
                                break;
                        }
                    @endphp
                    <label class="badge {{ $badgeClass }}">{{$tache->statut}}</label>
                </td>

                <td>
                    <a href="{{route('taches.edit', ['tache'=>$tache->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette tache?')){document.getElementById('form-{{$tache->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
                    <form id="form-{{$tache->id}}" action="{{route('taches.supprimer', ['tache'=>$tache->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Projet</th>
            <th scope="col">Nom Tache</th>
            <th scope="col">Description</th>
            <th scope="col">Date début</th>
            <th scope="col">Date fin</th>
            <th scope="col">Utilisateurs assignés</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
