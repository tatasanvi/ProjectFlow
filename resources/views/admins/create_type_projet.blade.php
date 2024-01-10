@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Ajout d'un nouveau type de projet</h3>
  <div class="mt-4">
    @if(session()->has("error"))
        <div class="alert alert-danger" style="text-align: center !important;">
            <h6>{{session()->get('error')}}</h6>
        </div>
    @endif
  </div>
    <form style="width:65%;" method="post" action="{{route('type_projets.ajouter')}}">
      @csrf
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
  <a href="{{route('type_projets')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection
