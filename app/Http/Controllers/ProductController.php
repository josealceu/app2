<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $cliente = new Client();
        $responseofAPI = $cliente->get("http://localhost:3000/products");
        $response = json_decode($responseofAPI->getBody());
        $response = array_map(function($element) {
            return [
                'nameOfcar' => "{$element->name} - {$element->description}",
                'price' => $element->price
            ];
        }, $response);

    return response()->json(
        [
            'msg' => 'from of ProductController',
            'response_of_localhost_3000' => $response
        ]
        );
    }
}
