@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Création d'un nouvelle ressource</h3>
  <div class="mt-4">
    @if(session()->has("error"))
        <div class="alert alert-danger" style="text-align: center !important;">
            <h6>{{session()->get('error')}}</h6>
        </div>
    @endif
  </div>
    <form style="width:65%;" method="post" action="{{route('ressources.ajouter')}}">
      @csrf

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Type de Projet</label>
        <select class="form-control" required name="type_projets_id">
          <option value=""></option>
            @foreach($type_projets as $type_projet)
              <option value="{{$type_projet->id}}">{{$type_projet->name}}</option>
            @endforeach
        </select>
      </div>
  <div class="mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" required name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
  </div>
  <div class="mb-3">
    <textarea name="description" rows="4" cols="50" maxlength="200" required></textarea>
    </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('ressources')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection
