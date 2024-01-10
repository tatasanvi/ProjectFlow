@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'une contrainte</h3>
  <div class="mt-4">
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
    </div>
    <form style="width:65%;" method="post" action="{{route('contraintes.update',['contrainte'=>$contrainte->id])}}">
      @csrf

        <input type="hidden" name="_method" value="put">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Type de Projet</label>
            <select class="form-control" required name="type_projets_id">
              <option value=""></option>
                 @foreach($type_projets as $type_projet)
                @if($type_projet->id == $contrainte->type_projets_id)
                  <option value="{{$type_projet->id}}" selected>{{$type_projet->name}}</option>
                  @else
                  <option value="{{$type_projet->id}}">{{$type_projet->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" required name="name" value="{{$contrainte->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut</label>
    <input type="text" class="form-control" required name="statut" value="{{$contrainte->statut}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
  </div>
  <div class="mb-3">
    <textarea name="description" rows="4" cols="50" maxlength="200" required>{{$contrainte->description}}</textarea>
    </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('contraintes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection
