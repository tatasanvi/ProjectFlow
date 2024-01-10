@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'un Type de projet</h3>
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
    <form style="width:65%;" method="post" action="{{route('type_projets.updates',['type_projet'=>$type_projet->id])}}">
      @csrf

        <input type="hidden" name="_method" value="put">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" required name="name" value="{{$type_projet->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
  </div>
  <div class="mb-3">
    <textarea name="description" rows="4" cols="50" maxlength="200" required>{{$type_projet->description}}</textarea>
    </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('type_projets')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection
