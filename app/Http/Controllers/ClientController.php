<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Models\client;
use GrahamCampbell\ResultType\Success;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class ClientController extends Controller
{
    public function client () {
        return view ('client', ['data' => client::all()]);
    }

    public function clientAdd () {
        return view('client-add');
    }

    public function addClient(ClientRequest $Req) {
        $client = new client();
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
        
        return redirect()->route('client-route')->with('success', 'Клієнт успішно добавлений.');
    }

    public function deleteClient($id) {
        client::find($id)->delete();
        return redirect()->route('client-route')->with('success', 'Клієнта видалено.');
    }

    public function clientUpdate($id) {
        return view('client-update', ['data' => client::find($id)]);
    }

    public function updateClient($id, ClientRequest $Req) {
        $client = client::find($id);
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

        return redirect()->route('client-route')->with('seccess', 'Клієнт успішно оновлено.');

    }

    //api

    public function getClient($id) {
        $client = client::find($id);

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
