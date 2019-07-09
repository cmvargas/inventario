@extends('plantilla')
@section('titulo')
    <h1>Ingresar producto</h1>
<br/>
@if ($numero==1)
    <div class="alert alert-success">Producto guardado</div>
@endif
@if ($numero==0)
    <div class="alert alert-danger">Producto no se pudo guardado</div>
@endif

<br/>
<a href="{{ route('inicio') }}">Menu principal</a>-><a>Ingresar producto</a>

@endsection
@section('cuerpo')
<br/>
<form method="POST" action="{{route('ingresarp2')}}" >
    @csrf
  <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
  </div>
<button type="submit" class="btn btn-primary">Ingresar producto</button>
</form>
@endsection