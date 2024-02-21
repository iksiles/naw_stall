<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use DOMDocument;

class newsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Hacer la solicitud a la API
        $response = Http::get('https://raw.githubusercontent.com/evroon/msfs-rss/main/feeds/thresholdx.xml');

        // Convertir el contenido XML a un objeto SimpleXMLElement
        $xmlData = simplexml_load_string($response->body(), "SimpleXMLElement", LIBXML_NOCDATA);
        
        // Obtener todas las entradas <entry>
        $entries = $xmlData->entry;

        // Pasar los datos a la vista
        return view('ns.index', ['entries' => $entries]);
    }
}