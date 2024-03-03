<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plane;
use App\Models\Msfs;
use Illuminate\Support\Facades\DB;

class planeController extends Controller
{
    // Ordena los datos recogidos de la BBDD en Wiki
    public function wikiIndex()
    {
        // Recoge y los ordena por ID, en ascendete, con una paginación de 15
        $plane = Plane::orderBy('id','asc')->paginate(15);
        // Devuelve la vista con los datos
        return view('ns.wiki', compact('plane'));
    }

    // Enseña la entrada seleccionada mediante la ID
    public function showEntry($id)
    {
        // Mediante la ID busca en la BBDD el avión
        $plane = Plane::findOrFail($id);
        // Variable para encontrar las relaciones en la BBDD
        $variant = $plane->model;
        // Busqueda de la variante mediante la relación en la BBDD
        $msfs = Msfs::where('model_ORG','=',$variant)->get();
        // Devuelve los datos obtenidos a la vista
        return view('ns.entryP', ['plane' => $plane, 'msfs' => $msfs]);
    }

    // Enseña la entrada de la variante del juego mediante ID
    public function showEntryMsfs($id)
    {
        // Mediante la ID busca en la BBDD el avión
        $msfs = Msfs::findOrFail($id);
        // Devuelve los datos en la vista
        return view('ns.entryM', ['msfs' => $msfs]);
    }
}