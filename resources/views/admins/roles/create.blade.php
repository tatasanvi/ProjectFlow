@extends("admins.app")
@section("content")
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Créer un nouveau rôle</b></h3>
        <div class="d-flex justify-content-end">
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Quelque chose s'est mal passé.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(array('route' => 'roles.store', 'method' => 'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Nom', 'class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    <br />
                    @foreach($permission as $value)
                    <label>
                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        <strong>{{ $value->name }}</strong>
                    </label>
                    <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
