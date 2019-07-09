<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',function(){
    return view('inicio');
})->name('inicio');

Route::get('ingresar','IngresarDatos@mostrarIngresarP')->name('ingresar');
Route::get('comprar','IngresarDatos@mostrarComprarP')->name('comprar');
Route::get('ingresarproducto2','IngresarDatos@ingProducto')->name('ingproducto');
Route::post('ingresarproducto','IngresarDatos@ingresarProducto')->name('ingresarp');
Route::post('comprarproducto','IngresarDatos@comprarProducto')->name('comprarp');
Route::get('generarfactura','IngresarDatos@generarFactura')->name('gfactura');
Route::post('ingp2','IngresarDatos@ingresarProducto2')->name('ingresarp2');