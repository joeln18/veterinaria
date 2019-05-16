@extends("theme.$theme.layout")
@section('titulo')
    Mascotas
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Editando mascota ({{$mascota->name}})</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.mascotas.update', ['user' => $mascota->id])}}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        <div class="box-body">  
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                            <input type="text" value="{{$mascota->nombre}}" class="form-control" placeholder="Nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                    <label for="raza">Raza</label>
                                <input type="text" value="{{$mascota->raza}}" class="form-control" placeholder="Raza" name="raza">
                            </div>
                            <div class="form-group">
                                    <label for="edad">Edad</label>
                                <input type="text" value="{{$mascota->edad}}" class="form-control" placeholder="Edad" name="edad">
                            </div>
                            <div class="form-group">
                                    <label for="propietario">Propietario</label>
                                <input type="text" value="{{implode(', ', $mascota->users()->get()->pluck('name')->toArray())}}" class="form-control" disabled>
                            <input type="hidden" value="{{$mascota->users_id}}" name="users_id">
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