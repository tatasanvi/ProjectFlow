@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des règles de gestion</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('regle_gestions.create')}}" class="btn btn-primary mb-3">Ajouter une nouvelle règle de gestion</a></div>
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
            <th scope="col">Type</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($regle_gestions as $regle_gestion)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$regle_gestion->TypeProjet['name']}}</td>
                <td>{{$regle_gestion->name}}</td>
                <td>{{$regle_gestion->description}}</td>
                <td>
                    <a href="{{route('regle_gestions.edit', ['regle_gestion'=>$regle_gestion->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette regle de gestion?')){document.getElementById('form-{{$regle_gestion->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
                    <form id="form-{{$regle_gestion->id}}" action="{{route('regle_gestions.supprimer', ['regle_gestion'=>$regle_gestion->id])}}" method="post">
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
            <th scope="col">Type</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
