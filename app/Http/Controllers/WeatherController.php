<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Leitura de arquivo em JSON
        $path = base_path('data/weather.json');
        $locales = json_decode(file_get_contents($path));

        return view('index', compact('locales'));
    }

    /* Método que busca os elementos no json */
    public function search(Request $request) {
        $path = base_path('data/weather.json');
        $data = json_decode(file_get_contents($path));

        // Valor do input é inserido na variável search
        $search = $request->search_value;
        $pos = -1;

        // Caso a valor da busca seja em branco retorna todos os dados
        if(!$search){
            $locales = $data;
            return view('locales', compact('locales'))->render();
        }

        /* Busca a sequência de caracteres do input em locale 
            retorna a posição correspondente
        */
        for($i = 0; $i < count($data); $i++) {
            if(stristr($data[$i]->locale->name,$search))
                $pos = $i;
        }

        if($pos != -1) {
            $locales[0] = $data[$pos];
            return view('locales', compact('locales'))->render();
        }

        // O elemento não foi encontrado
        return view('locales');
    }
}
