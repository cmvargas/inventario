@extends('plantilla')
@section('titulo')
    <h1>Sistema de inventario</h1>
@endsection
@section('cuerpo')
<a href="{{ route('ingproducto') }}" class="btn btn-primary">Ingresar producto</a>
<br/>
<br/>
<a href="{{ route('ingresar') }}" class="btn btn-primary">Ingresar lote producto</a>
<br/>
<br/>
<a href="{{ route('comprar') }}" class="btn btn-primary">Comprar producto</a>
<br/>
<br/>
<a href="#" class="btn btn-primary">Visualización</a>
<br/>
<br/>
@endsection