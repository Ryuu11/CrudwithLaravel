
@extends('layouts.app')

@section('content')

<div class="container">
@if(Session::has('Mensaje'))

<div class="alert alert-primary" role="alert">
{{Session::get('Mensaje')
}}
</div>
@endif

<form action="{{url('/contacto')}}" class="form-horizontal" method="post">
{{csrf_field()}}
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" class="form-control" name="Nombre" id="Nombre" value="">

</div>


<div class="form-group">
<label for="Direccion" class="control-label">{{'Direccion'}}</label>
<input type="text" class="form-control" name="Direccion" id="Direccion" value="">
</div>


<div class="form-group">
<label for="Telefono" class="control-label">{{'Telefono'}}</label>
<input type="text" class="form-control" name="Telefono" id="Telefono" value="">
<div class="form-group">


<div class="form-group">
<label for="Correo" class="control-label">{{'Correo'}}</label>
<input type="text" class="form-control" name="Correo" id="Correo" value="">
</div class="form-group">

<div class="form-group">
<label for="Comentarios" class="control-label">{{'Comentarios'}}</label>
<input type="text" class="form-control" name="Comentarios" id="Comentarios" value="">
</div class="form-group">

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Enviar">
</div>
</form>
@endsection