<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->group(['prefix' => '/api'], function () use ($app) {
    $app->get('/hoteles', function() {
  		return DB::select('SELECT * FROM hoteles');
    });

    $app->get('/hoteles/ciudad/', function() {
  		return DB::select("SELECT c.nombre FROM hoteles h INNER JOIN ciudades c ON h.idestado=c.idestado");
    });
    
    $app->get('/hoteles/ciudad/{idciudad}', function($idciudad) {
  		return DB::select("SELECT h.idhotel, c.idestado, h.nombre, h.direccion, h.descripcion,  cal.valor as calificacion FROM hoteles h INNER JOIN ciudades c ON h.idestado=c.idestado INNER JOIN  calificaciones cal ON cal.idhotel=h.idhotel where c.idestado = '".$idciudad."'");
    });

});
