@extends("theme.$theme.layout2")
@section('titulo')
    Administrar Usuarios
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Administrar Usuarios</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                                
                            </tr>
                            
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(', ', $user->rols()->get()->pluck('name')->toArray())}}</td>
                                    <td>
                                        <a href="{{ route('user.users.edit', $user->id)}}">
                                                <button type="button" class="btn btn-secondary btn-sm">Editar</button>
                                        </a>
                                    </td>
                                    
                                </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection