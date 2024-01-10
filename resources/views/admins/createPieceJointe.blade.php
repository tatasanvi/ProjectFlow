@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Création d'une nouvelle pièce jointe</h3>
  <div class="mt-4">
    @if(session()->has("error"))
        <div class="alert alert-danger" style="text-align: center !important;">
            <h6>{{session()->get('error')}}</h6>
        </div>
    @endif
  </div>
    <form style="width:65%;" method="post" action="{{route('piece_jointes.ajouter')}}" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"><Table>Tache</Table></label>
        <select class="form-control" required name="taches_id">
          <option value=""></option>
            @foreach($taches as $tache)
              <option value="{{$tache->id}}">{{$tache->nomTache}}</option>
            @endforeach
        </select>
      </div>
  <div class="mb-3">
    <label class="form-label">Fichier</label>
    <input type="file" class="form-control" name="file_path" >
  </div>

  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('piece_jointes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection
