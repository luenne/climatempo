<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;
use App\Locale;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weathers = Weather::orderBy('locale_id')->get();
        $locales = Locale::orderBy('id')->get();

        return view('index', compact('weathers', 'locales'))->render();
    }

    /* Método que busca os elementos no json */
    public function search(Request $request) {
        $weathers = Weather::orderBy('locale_id')->get();
        $locales = Locale::orderBy('id')->get();

        // Valor do input é inserido na variável search
        $search = $request->search_value;

        // Verifica se a variável é possui um valor atribuído
        if($search) {
            // Busca a sequência de caracteres do input em weathers
            $weathers = $weathers->filter(function ($item) use ($search) {
                return false !== (stristr($item->locale->name, $search));
            });

            $locales = $locales->filter(function ($item) use ($search) {
                return false !== (stristr($item->name, $search));
            });
        }
        return view('locales', compact('weathers', 'locales'))->render();
    }
}
