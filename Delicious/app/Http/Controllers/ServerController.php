<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ServerController extends Controller
{
    public function index()
    {
        // Token di accesso
        $token = 'insert your token';

        // Chiamata API a BattleMetrics per ottenere i server di Rust
        $response = Http::withToken($token)
            ->get('https://api.battlemetrics.com/servers', [
                'filter[game]' => 'rust',
                'filter[status]' => 'online',
                'page[size]' => 30, // Mostra 10 server
            ]);

        // Convertiamo la risposta JSON in un array associativo PHP
        $servers = $response->json('data'); // Otteniamo solo i dati dei server

        // Passiamo i server alla vista Blade
        return view('servers', compact('servers'));
    }
}
