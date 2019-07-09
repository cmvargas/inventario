@extends('plantilla')
@section('titulo')
    <h1>Compra de producto</h1>
<br/>
<a href="{{ route('inicio') }}">Menu principal</a>-><a>Comprar producto</a>
<br/>
@if ($numero==1)
    <div class="alert alert-success">Producto guardado satisfactoriamente</div>
@endif
@if ($numero==0)
    <div class="alert alert-danger">Producto no se pudo guardado por que no existe lotes de ese producto</div>
@endif
@if ($numero==2)
    <div class="alert alert-danger">Producto no se pudo guardado pues la cantidad es cero</div>
@endif
@if ($numero==4)
    <div class="alert alert-danger">Producto no se pudo guardado pues ya esta agregado</div>
@endif
@endsection
@section('cuerpo')
<br/>

<form method="POST" action="{{route('comprarp')}}" >
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
    <label>Precio total</label>
    <input type="text" class="form-control" id="ptotal" name="ptotal" placeholder="Precio total" required>
  </div>
<button type="submit" class="btn btn-primary">Comprar producto</button>
    </form>
@endsection
@section('tabla')
<br/>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID PRODUCTO</th>
      <th scope="col">ID LOTE</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">PRECIO TOTAL</th>
    </tr>
  </thead>
  <tbody>
    @foreach($temporal1 as $item)
    <tr>
      <td>{{$item->id_p}}</td>
      <td>{{$item->id_lote}}</td>
      <td>{{$item->cantidad}}</td>
      <td>{{$item->precio_t}}</td>
    </tr>
    @endforeach
</table>
<a href="{{ route('gfactura') }}" class="btn btn-primary">Generar factura</a>

@endsection