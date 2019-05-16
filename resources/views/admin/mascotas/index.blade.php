@extends("theme.$theme.layout")
@section('titulo')
    Administrar Mascotas
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Administrar Mascotas</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Raza</th>
                                <th>Edad</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                                <th>Eliminar</th>

                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($mascotas as $mascota)
                                <tr>
                                    <td>{{$mascota->id}}</td>
                                    <td>{{$mascota->nombre}}</td>
                                    <td>{{$mascota->raza}}</td>
                                    <td>{{$mascota->edad}}</td>
                                    <input type="hidden" name="users_id" value="{{$mascota->users_id}}">
                                    <td>{{implode(', ', $mascota->users()->get()->pluck('name')->toArray())}}</td>
                                    
                                    <td>
                                        <a href="{{ route('admin.mascotas.edit', $mascota->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.mascotas.destroy', $mascota->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection