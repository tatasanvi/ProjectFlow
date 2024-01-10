@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'une tache</h3>
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
    <form style="width:65%;" method="post" action="{{route('taches.update',['tache'=>$tache->id])}}">
      @csrf

        <input type="hidden" name="_method" value="put">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Projet</label>
            <select class="form-control" required name="projets_id">
              <option value=""></option>
                 @foreach($projets as $projet)
                @if($projet->id == $tache->projets_id)
                  <option value="{{$projet->id}}" selected>{{$projet->nomProjet}}</option>
                  @else
                  <option value="{{$projet->id}}">{{$projet->nomProjet}}</option>
                @endif
                @endforeach
            </select>
        </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" required name="nomTache" value="{{$tache->nomTache}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Date début</label>
    <input type="date" class="form-control" required name="dateDébut" value="{{$tache->dateDébut}}" min="{{now()->toDateString('Y-m-d')}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Date fin</label>
    <input type="date" class="form-control" required name="dateFin" value="{{$tache->dateFin}}" min="{{now()->toDateString('Y-m-d')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Utilisateurs à assigner</label>
    <div class="select2-blue">
        <select class="select2" multiple="multiple" data-placeholder="Ajoutez les utilisateurs" data-dropdown-css-class="select2-blue" style="width: 100%;" name="users[]" required>
            <option value=""></option>
            @foreach($data as $user)
                <option value="{{ $user->id }}" {{ in_array($user->id, $selectedUserIds) ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
</div>

  <div class="mb-3">
    <textarea name="description" rows="4" cols="50" maxlength="200" required>{{$tache->description}}</textarea>
    </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('taches')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection
