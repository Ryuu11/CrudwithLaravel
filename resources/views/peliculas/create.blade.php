@extends('layouts.app')

@section('content')


<div class="container">
<h1>Agregar peliculas</h1>

<form action="{{url('/peliculas')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}
@include('peliculas.form',['Modo'=>'crear'])
</div>
@endsection