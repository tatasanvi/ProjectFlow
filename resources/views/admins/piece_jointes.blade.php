@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des Pièces jointes</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('piece_jointes.create')}}" class="btn btn-primary mb-3">Ajouter une nouvelle pièce jointe</a></div>
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
            <th scope="col">Tache</th>
            <th scope="col">Nom </th>
            <th scope="col">Taille</th>
            <th scope="col">Fichier</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($piece_jointes as $piece_jointe)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$piece_jointe->Tache['nomTache']}}</td>
                <td>{{$piece_jointe->filename}}</td>
                <td>{{$piece_jointe->file_size}} Mo</td>
                <td><a href="{{ asset($piece_jointe->file_path) }}" target="_blank" class="btn btn-success"><i class="nav-icon fas fa-eye"></i></a></td>
                <td>
                    <a href="{{route('piece_jointes.edit', ['piece_jointe'=>$piece_jointe->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette piece jointe?')){document.getElementById('form-{{$piece_jointe->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
                    <form id="form-{{$piece_jointe->id}}" action="{{route('piece_jointes.supprimer', ['piece_jointe'=>$piece_jointe->id])}}" method="post">
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
            <th scope="col">Tache</th>
            <th scope="col">Nom </th>
            <th scope="col">Taille</th>
            <th scope="col">Fichier</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
