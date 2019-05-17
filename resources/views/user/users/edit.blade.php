@extends("theme.$theme.layout")
@section('titulo')
    Administrar Usuarios
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Administrar Rol de ({{$user->name}})</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <form action="{{ route('user.users.update', ['user' => $user->id])}}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        <select name="rols">
                            @foreach($rols as $rol)
                                
                                    <option value="{{$rol->id}}"
                                        {{$user->hasAnyRole($rol->name)?'checked':''}}>
                                    {{ $rol->name}}</option>
                                    
                                    
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection