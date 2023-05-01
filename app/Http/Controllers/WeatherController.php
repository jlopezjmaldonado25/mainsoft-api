<?php

namespace App\Http\Controllers;

use App\Contracts\IWeather;
use App\Models\History;
use Illuminate\Http\Response;

class WeatherController extends Controller
{

    private IWeather $_weatherService ;

    function __construct(IWeather $weatherService) {
        $this->_weatherService = $weatherService;
    }

    function getWeather(string $ciudad) {

        try {
            $data    = $this->_weatherService->getWeather($ciudad);
            $exito   = true;
            $codigo  = Response::HTTP_OK;
            $mensaje = "Consulta Realizada Exitosamente";
            $error   = null;
            $this->_weatherService->createHistory($ciudad, json_encode($data));

        } catch (\Exception $e) {
            $data    = null;
            $exito   = false;
            $codigo  = Response::HTTP_NOT_FOUND;
            $mensaje = "Imposible Realizar la consulta";
            $error   = $e->getMessage();
        }

        return response()-> json([
            'data'      => $data,
            'exito '    => $exito,
            'codigo'    => $codigo,
            'mensaje'   => $mensaje,
            'error'     => $error
        ], $codigo);
    }

    function getHistory() {
        try {
            $data    = $this->_weatherService->getHistory();
            $exito   = true;
            $codigo  = Response::HTTP_OK;
            $mensaje = "Consulta Realizada Exitosamente";
            $error   = null;

        } catch (\Exception $e) {
            $data    = null;
            $exito   = false;
            $codigo  = Response::HTTP_NOT_FOUND;
            $mensaje = "Imposible Realizar la consulta";
            $error   = $e->getMessage();
        }

        return response()-> json([
            'data'      => $data,
            'exito '    => $exito,
            'codigo'    => $codigo,
            'mensaje'   => $mensaje,
            'error'     => $error
        ], $codigo);;
    }
}
