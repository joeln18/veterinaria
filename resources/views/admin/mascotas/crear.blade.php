@extends("theme.$theme.layout")
@section('titulo')
    Crear Mascota
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Mascota</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.mascotas.store')}}" method="post">
                        {{@csrf_field()}}
                        
                        <div class="box-body">  
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre mascota" name="nombre">
                            </div>
                            <div class="form-group">
                                    <label for="raza">Raza</label>
                                    <input type="text" class="form-control" placeholder="Escribe la raza" name="raza">
                            </div>
                            <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="text" class="form-control" placeholder="Edad de tu mascota" name="edad">
                            </div>
                            <div class="form-group">
                                <label for="users_id">Propietario </label>
                                <select name="users_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">
                                            {{ $user->name}}({{ $user->id }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                                <!-- /.box-body -->
                  
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection