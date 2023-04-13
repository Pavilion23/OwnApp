<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use GrahamCampbell\ResultType\Success;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class ClientController extends Controller
{
    public function index () {
        return view ('clients', ['data' => Client::all()]);
    }

    public function create () {
        return view('clients_create');
    }

    public function destroy($id) {
        Client::find($id)->delete();
        return redirect()->route('clients.index')->with('success', 'Клієнта видалено.');
    }

    public function store(ClientRequest $Req) {
        $client = new Client();
        $client->client      = $Req->input('client');
        $client->adres       = $Req->input('adres');
        $client->edrpou      = $Req->input('edrpou');
        $client->nomer_pdv   = $Req->input('nomer_pdv');
        $client->statut_fond = $Req->input('statut_fond');
        if($Req->input('platnyk_pdv'))
            $client->platnyk_pdv = true;
        else
            $client->platnyk_pdv = false;

        $client->save();
        return redirect()->route('clients.index')->with('success', 'Клієнт успішно добавлений.');
    }

    public function edit($id) {
        return view('clients_update', ['data' => Client::find($id)]);
    }

    public function update($id, ClientRequest $Req) {
        $client = Client::find($id);
        $client->client      = $Req->input('client');
        $client->adres       = $Req->input('adres');
        $client->edrpou      = $Req->input('edrpou');
        $client->nomer_pdv   = $Req->input('nomer_pdv');
        $client->statut_fond = $Req->input('statut_fond');
        if($Req->input('platnyk_pdv'))
            $client->platnyk_pdv = true;
        else
            $client->platnyk_pdv = false;

        $client->save();
        return redirect()->route('clients.index')->with('success', 'Клієнт успішно оновлено.');
    }

    //api

    public function getClient($id) {
        $client = Client::find($id);

        if(!$client) {
            return response()->json([
                'Success' => false,
                'message' => 'Client not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'client' => new ClientResource($client)
        ]);
    }

    public function getClients() {
        //$clients = client::all();

        return response()->json([
            'success' => true,
            //'clients' => new ClientCollection($clients),
            'clients' => new ClientCollection(client::all()),
        ]);
    }
}
