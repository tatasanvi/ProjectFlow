@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des ressources</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('ressources.create')}}" class="btn btn-primary mb-3">Ajouter une nouvelle ressource</a></div>
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
          @foreach ($ressources as $ressource)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$ressource->TypeProjet['name']}}</td>
                <td>{{$ressource->name}}</td>
                <td>{{$ressource->description}}</td>
                <td>
                    <a href="{{route('ressources.edit', ['ressource'=>$ressource->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette ressource?')){document.getElementById('form-{{$ressource->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
                    <form id="form-{{$ressource->id}}" action="{{route('ressources.supprimer', ['ressource'=>$ressource->id])}}" method="post">
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
