@extends("theme.$theme.layout")
@section('titulo')
    Administrar Usuarios
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Administrar {{$user->name}}</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <form action="{{ route('admin.users.update', ['user' => $user->id])}}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        @foreach($rols as $rol)
                            <div class="form-check">
                                <input type="checkbox" name="rols[]" value="{{$rol->id}}"
                                    {{$user->hasAnyRole($rol->name)?'checked':''}}>
                                <label>{{ $rol->name}}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection