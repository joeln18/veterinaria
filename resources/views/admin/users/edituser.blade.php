@extends("theme.$theme.layout")
@section('titulo')
    Permisos
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Editando a ({{$user->name}})</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.users.update', ['user' => $user->id])}}" method="POST">
                        @csrf
                        {{ method_field('PUT')}}
                        <div class="box-body">  
                            <div class="form-group">
                                <label for="name">Nombre</label>
                            <input type="text" value="{{$user->name}}" class="form-control" placeholder="Nombre" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                            <input type="email" value="{{$user->email}}" class="form-control" id="email" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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