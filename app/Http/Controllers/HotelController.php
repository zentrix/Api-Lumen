<?php

namespace App\Http\Controllers;
use DB;

class HotelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $users = DB::table('users')->get();

        return view('user.index', ['users' => $users]);
    }

    public function hoteles()
    {
        return DB::select("SELECT * FROM hoteles");
    }

    public function getIdHoteles($idHotel)
    {
        return DB::select('SELECT h.nombre FROM hoteles h INNER JOIN ciudades c ON h.idestado=c.idestado where idHotel= '.$idHotel.'');
    }

    public function ciudad()
    {
        return DB::select('SELECT c.nombre FROM hoteles h INNER JOIN ciudades c ON h.idestado=c.idestado');
    }
    public function getIdCiudad($idCiudad)
    {
       return DB::select('SELECT h.idhotel, c.idestado, h.nombre, h.direccion, h.descripcion,  cal.valor as calificacion FROM hoteles h INNER JOIN ciudades c ON h.idestado=c.idestado INNER JOIN  calificaciones cal ON cal.idhotel=h.idhotel where c.idestado = "'.$idciudad.'"');
    }
    public function getNameCiudad($name)
    {
       return DB::select('SELECT h.idhotel, c.idestado, h.nombre, h.direccion, h.descripcion,  cal.valor as calificacion FROM hoteles h INNER JOIN ciudades c ON h.idestado=c.idestado INNER JOIN  calificaciones cal ON cal.idhotel=h.idhotel where c.idestado = "'.$nameCiudad.'"');
    }

    //
}
