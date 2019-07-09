@extends('plantilla')
@section('titulo')
    <h1>Ingresar producto</h1>
<br/>
@if ( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif
<br/>
<a href="{{ route('inicio') }}">Menu principal</a>-><a>Ingresar lote producto</a>

@endsection
@section('cuerpo')
<br/>
<form method="POST" action="{{route('ingresarp')}}" >
    @csrf
  <div class="form-group">
    <label>Producto</label>
    <select class="custom-select" id="producto" name="producto" required>
        @foreach($productos as $item)
            <option value="{{$item->id_p}}">{{$item->nombre}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Cantidad</label>
    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" required>
  </div>
  <div class="form-group">
    <label>Número de lote</label>
    <input type="text" class="form-control" id="nlote" name="nlote" placeholder="Número de lote" required>
  </div>
  <div class="form-group">
    <label>Fecha de vencimiento</label>
    <input type="date" class="form-control" id="fvencimiento" name="fvencimiento" placeholder="Fecha de vencimiento" required>
  </div>
  <div class="form-group">
    <label>Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" required>
  </div>
<button type="submit" class="btn btn-primary">Ingresar lote producto</button>
</form>
@endsection