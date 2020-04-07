
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" class="form-control" name="Nombre" id="Nombre" value="{{isset($pelicula->Nombre)?$pelicula->Nombre:''}}">

</div>


<div class="form-group">
<label for="Genero" class="control-label">{{'Genero'}}</label>
<input type="text" class="form-control" name="Genero" id="Genero" value="{{isset($pelicula->Genero)?$pelicula->Genero:''}}">
</div>


<div class="form-group">
<label for="Actores" class="control-label">{{'Actores'}}</label>
<input type="text" class="form-control" name="Actores" id="Actores" value="{{isset($pelicula->Actores)?$pelicula->Actores:''}}">
<div class="form-group">


<div class="form-group">
<label for="Director" class="control-label">{{'Director'}}</label>
<input type="text" class="form-control" name="Director" id="Director" value="{{isset($pelicula->Director)?$pelicula->Director:''}}">
</div class="form-group">

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
@if(isset($pelicula->Foto))
<br/>
<img src="{{asset('storage').'/'.$pelicula->Foto}}" class="img-thumbnail img-fluid" alt="" width="200">
<br/>
@endif
<input type="file"  name="Foto" id="foto" value="">
</div class="form-group">

<div class="form-group">
<label for="Video" class="control-label">{{'Video'}}</label>
<input type="text"  class="form-control" name="Video" id="Video" value="{{isset($pelicula->Video)?$pelicula->Video:''}}">

<br/>
<input type="submit" class="btn btn-primary" value="{{$Modo=='crear' ? 'Agregar ':'Modificar'}}">
</div class="form-group">