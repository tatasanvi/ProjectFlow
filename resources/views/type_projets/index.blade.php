@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Type de projet</h2>
            </div>
            <div class="pull-right">
                @can('type_projet-create')
                <a class="btn btn-success" href="{{ route('type_projets.create') }}"> Créer un nouveau type de projet </a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('succès'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($type_projets as $type_projet)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $type_projet->name }}</td>
	        <td>{{ $type_projet->description }}</td>
	        <td>
                <form action="{{ route('type_projets.destroy',$type_projet->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('type_projets.show',$type_projet->id) }}">Show</a>
                    @can('type_projet-edit')
                    <a class="btn btn-primary" href="{{ route('type_projets.edit',$type_projet->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('type_projet-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $type_projets->links() !!}

@endsection
