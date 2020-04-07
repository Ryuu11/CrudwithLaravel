@extends('layouts.app')

@section('content')


<div class="container">
@if(Session::has('Mensaje'))

<div class="alert alert-primary" role="alert">
{{Session::get('Mensaje')
}}

</div>
@endif


<a href="{{url('peliculas/create')}}" class="btn btn-success">Agregar peliculas</a>
<br/>
<br/>
<table class="table table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Actores</th>
            <th>Video</th>
            <th>Director</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($peliculas as $pelicula)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
            <img src="{{asset('storage').'/'.$pelicula->Foto}}" class="img-thumbnail img-fluid" alt="" width="200">
            
            


            </td>
            <td>{{$pelicula->Nombre}}</td>
            <td>{{$pelicula->Genero}}</td>
            <td>{{$pelicula->Actores}}</td>
            <td>{{$pelicula->Video}}</td>
            <td>{{$pelicula->Director}}</td>
            <td>
            <a class="btn btn-primary" href="{{url('/peliculas/'.$pelicula->id.'/edit') }}">Editar</a>
            
             | 
            
            <form method="post" action="{{url ('peliculas/'.$pelicula->id)}}" style="display:inline">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de que quieres borrar?');">Borrar</button>
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>
   
</table>
{{$peliculas->links()}}
</div> 
@endsection