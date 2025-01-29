<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getProvinces()
    {
        // Replace 'YOUR_API_KEY' with your OpenWeather API key
        // $apiKey = 'YOUR_API_KEY';
        
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "https://wilayah.id/api/provinces.json";

        try {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('location', [
                'provinceData' => $data
            ]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    public function getCities(Request $request){
        $province_code = $request->province_code;

        $client = new Client();

        $apiUrl = "https://wilayah.id/api/regencies/{$province_code}.json";

        try {
             // Make a GET request to the OpenWeather API
             $response = $client->get($apiUrl);

             // Get the response body as an array
             $data = json_decode($response->getBody(), true);
 
             // Handle the retrieved weather data as needed (e.g., pass it to a view)
             return $data;
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}
