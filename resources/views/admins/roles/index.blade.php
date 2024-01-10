@extends("admins.app")
@section("content")
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Gestion des rôles</b></h3>
        <div class="d-flex justify-content-end">
            @can('role-create')
            <div><a href="{{ route('roles.create') }}" class="btn btn-primary">Ajouter un nouveau rôle</a></div>
            @endcan
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col"><b>#</b></th>
                    <th scope="col"><b>Nom</b></th>
                    <th scope="col"><b>Actions</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td><strong>{{ ++$i }}</strong></td>
                    <td><strong>{{ $role->name }}</strong></td>
                    <td>
                        <a href="{{ route('roles.show',$role->id) }}" class="btn btn-info"><i class="nav-icon fas fa-eye"></i></a>
                        @can('role-edit')
                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                        @endcan
                        @can('role-delete')
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $role->id }}">
                            <i class="nav-icon fas fa-trash-alt"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $role->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $role->id }}">Confirmation de suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer ce rôle?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col"><b>#</b></th>
                    <th scope="col"><b>Nom</b></th>
                    <th scope="col"><b>Actions</b></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
