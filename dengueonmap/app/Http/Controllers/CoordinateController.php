<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CoordinateController extends Controller
{
    public function buscarCep($cep)
    {
        Log::info('Buscando dados para o CEP: ' . $cep);

        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = Http::get($url);
        $data = $response->json();

        Log::info('Resposta da API de CEP: ', $data);

        if (isset($data['erro'])) {
            Log::error('CEP não encontrado: ' . $cep);
            return response()->json(['error' => 'CEP não encontrado'], 404);
        }

        return response()->json($data);
    }

    public function getCoordinates($address)
    {
        Log::info('Obtendo coordenadas para o endereço: ' . $address);

        $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($address) . "&format=json&addressdetails=1&limit=1";
        
        Log::info('URL de requisição: ' . $url);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'DengueOnMap/1.0 (renatobdo@gmail.com)');
        $output = curl_exec($ch);
        curl_close($ch);

        Log::info('Resposta da API: ' . $output);

        $data = json_decode($output, true);

        if (isset($data[0])) {
            Log::info('Coordenadas encontradas: Latitude - ' . $data[0]['lat'] . ', Longitude - ' . $data[0]['lon']);
            return [
                'latitude' => $data[0]['lat'],
                'longitude' => $data[0]['lon']
            ];
        } else {
            Log::error('Nenhuma coordenada encontrada para o endereço: ' . $address);
            return null;
        }
    }
}
