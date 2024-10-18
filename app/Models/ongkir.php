<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Ongkir extends Model
{
    use HasFactory;

    public static function getProvinsi($id)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY', false)
        ])->get('https://api.rajaongkir.com/starter/province', [
            'id' => $id
        ]);
        return $response;
    }

    public static function listProvinsi()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY', false)
        ])->get('https://api.rajaongkir.com/starter/province');
        return $response;
    }

    public static function getCity($id)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY', false)
        ])->get('https://api.rajaongkir.com/starter/city', [
            'id' => $id
        ]);
        return $response;
    }

    public static function listCity()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY', false)
        ])->get('https://api.rajaongkir.com/starter/city');
        return $response;
    }

    public static function calculateShippingCost($fromCityId)
    {
        $apiKey = env('RAJAONGKIR_API_KEY');

        try {
            $response = Http::withHeaders([
                'key' => $apiKey,
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $fromCityId,
                'destination' => '7',
                'weight' => 30,
                'courier' => 'jne', // contoh kurir
            ]);

            if ($response->successful()) {
                return json_decode($response->getBody(), true);
            } else {
                return [
                    'success' => false,
                    'message' => 'API Error: ' . $response->status(),
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
    }
}
