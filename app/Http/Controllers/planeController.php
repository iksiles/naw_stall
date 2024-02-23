<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plane;
use App\Models\Msfs;
use Illuminate\Support\Facades\DB;

class planeController extends Controller
{
    public function wikiIndex()
    {
        $plane = Plane::orderBy('id','asc')->paginate(15);
        return view('ns.wiki', compact('plane'));
    }

    public function showEntry($id)
    {
        $plane = Plane::findOrFail($id);
        $variant = $plane->model;
        $msfs = Msfs::where('model_ORG','=',$variant)->get();
        return view('ns.entryP', ['plane' => $plane, 'msfs' => $msfs]);
    }

    public function showEntryMsfs($id)
    {
        $msfs = Msfs::findOrFail($id);
        return view('ns.entryM', ['msfs' => $msfs]);
    }
}