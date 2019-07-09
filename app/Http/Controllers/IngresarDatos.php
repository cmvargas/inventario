<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class IngresarDatos extends Controller
{
    public function mostrarIngresarP(){
        $productos = App\Producto::all();
        return view('ingresar_p',compact('productos')); 
    }
    public function ingProducto(){
        $numero=3;
        return view('ingProducto', compact('numero')); 
    }
    public function ingresarProducto2(Request $request){
        $producto = new App\Producto;
        $producto->nombre=$request->nombre;
        $guardado=$producto->save();
        $numero=0;
        if($guardado==true){
            $numero=1;
        }
        return view('ingProducto', compact('numero'));
    }
    public function mostrarComprarP(){
        $productos = App\Producto::all();
        $temporal1 = App\Temporal::all();
        $numero=3;
        return view('comprar_p',compact('productos','temporal1','numero'));
    }
    public function ingresarProducto(Request $request){
        
        //return $request->all();
        $lote = new App\Lote;
        $lote->id_lote = $request->nlote;
        $lote->id_p = (int)$request->producto;
        $lote->cantidad =(int) $request->cantidad;
        $lote->precio_u = (double)$request->precio;
        $lote->fecha_v = $request->fvencimiento;
        
        $lote->save();
        return back()->with('mensaje', 'Producto Agregado');;
    }
    public function comprarProducto(Request $request){
        $producto=(int)$request->producto;
        $cantidad=(int)$request->cantidad;
        $produc=DB::table('lotes')->where('id_p','=',$producto)->get();
        $temporales=DB::table('temporals')->where('id_p','=',$producto)->get();
        $cantidadtotal=0;
        $contador=0;
        $contador2=0;
        $numero=0;
        foreach($produc as $item){
            $contador=$contador+1;
            $cantidadtotal=$cantidadtotal+$item->cantidad;
        }
        foreach($temporales as $item){
            $contador2=$contador2+1;
        }
        $suma=0;
        $bandera2=1;
        $guardarid=array();
        $guardarprecio=array();
        $guardarcantidad=array();
        $lote=DB::table('lotes')->where('id_p','=',$producto)->get();
        
        if($contador>0){
            if($contador2==0){
                if($cantidadtotal>0){
            $numero=1;
            foreach($lote as $item){
                if ($bandera2==1){
                   array_push($guardarid,$item->id_lote);
                   array_push($guardarprecio,$item->precio_u);
                   array_push($guardarcantidad,$item->cantidad); 
                }
                $suma=$suma+(int)$item->cantidad;
                if($cantidad<=$suma){
                $bandera2=0;
                }

            }  
        $suma=0;
        $tamarray=count($guardarid);
        $cantidad2=0;
        $preciototal=0;
        for ($i = 0; $i < $tamarray; $i++) {
            $suma=$suma+$guardarcantidad[$i];
        }
        
        if ($suma<$cantidad){
        }
        if($suma>$cantidad){
            $cantidad2=$suma-$guardarcantidad[$tamarray-1];
            $guardarcantidad[$tamarray-1]=$cantidad-$cantidad2;
        }
        if ($suma==$cantidad){
        }
        $temporal = new App\Temporal;
        for ($i = 0; $i < $tamarray; $i++) {
            $temporal->id_p=$request->producto;
            $temporal->id_lote=$guardarid[$i];
            $temporal->cantidad=$guardarcantidad[$i];
            $temporal->precio_t=$guardarcantidad[$i]*$guardarprecio[$i];
                
        }
        $temporal->save();
        }else{
                $numero=2;    
                }
            }else{
                $numero=4;
            }
        }
        $temporal1 = App\Temporal::all();
        $productos = App\Producto::all();
        return view('comprar_p',compact('temporal1','productos','numero'));
        
    }
    
    public function generarFactura(){
        $factura = new App\Factura;
        $factura->save();
        $factura= App\Factura::all();
        $temporal= App\Temporal::all();
        $contador4=0;
        $cantidadtotal=0;
        $numero=0;
        $temporales=DB::table('temporals')->get();
        foreach($temporales as $item){
            $contador4=$contador4+1;
            $cantidadtotal=$cantidadtotal+$item->cantidad;
        }
        if($contador4>0){
            $numero=1;
        $productof=new App\Productof;
        $contador=0;
        foreach($temporal as $item){
            $productof->id_f=$factura->last()->id_f;
            $productof->id_p=$item->id_p;
            $productof->id_lote=$item->id_lote;
            $productof->id_cantidad=$item->cantidad;
            $contador=$contador+1;
        }
        $productof->save();
        
        $producto3=DB::table('temporals')->delete();
        }
        $productos = App\Producto::all();
        $temporal1 = App\Temporal::all();
        $numero=3;
        return view('comprar_p',compact('productos','temporal1','numero'));
    }
}
