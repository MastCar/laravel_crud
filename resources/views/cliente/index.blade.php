<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery Chongoyape - Gestion Clientes </title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container"></div>
<h4>Gestion de Clientes</h4>
<div class="row">
    <div class="col-xl-12">
        <form action="{{route('cliente.index')}}" method="get">
            <div class="form-row">
                <div class="col-sm-4 my-1">
                    <input type="text" class="form-control" name="texto" value="{{$texto}}">
                </div>
                <div class="col-auto my-1">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
                <div class="col-auto my-1">
                    <a href="{{route('cliente.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </form>

    </div>
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-striped">
                  <thead>
                  <tr>
                      <th>Opciones</th>
                      <th>ID</th>
                      <th>Apellidos</th>
                      <th>Nombre</th>
                      <th>Documento</th>
                      <th>Telefono</th>
                      <th>Direccion</th>
                      <th>Email</th>
                  </tr>
                  </thead>
                <tbody>
                @if(count($clientes)<=0)
                <tr>
                    <td colspan="8">No hay Resultados</td>
                </tr>
                @else

                @foreach ($clientes as $cliente)
                <tr>
                    <td><a href="{{route('cliente.edit' ,$cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                      <form action="{{route('cliente.destroy',$cliente->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger btn -sm" value="Eliminar">
                      </form>
                    </td>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->apellidos}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->documento}}</td>
                    <td>{{$cliente->telefono}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>{{$cliente->email}}</td>

                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            {{$clientes->links()}}
        </div>
    </div>
</div>
</body>
</html>
