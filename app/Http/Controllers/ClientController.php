<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Exception;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Client::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->only(['name', 'city']);
        $client = Client::create($data);
        $client->save();
        return ['message' => 'Stored ' . $data['name'] . ' Client!'];
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $clients, $cod)
    {
        $client = $clients->where('cod', '=', $cod)->get();
        return $client;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client, $cod)
    {
        $exist = Client::where('cod', $cod)->first();
        if (empty($exist)) {
            return ['message' => 'Client does not exist'];
        }
        $name = $request->get('name');
        Client::where('cod', $cod)
            ->update(['name' => $name]);

        return ['message' => 'Updated! ' . $name . ' Client'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client, $cod)
    {
        $exist = Client::where('cod', $cod)->first();
        if (empty($exist)) {
            return ['message' => 'Client does not exist'];
        }
        $name = $exist['name'];
        Client::where('cod', $cod)->delete();

        return ['message' => 'Delete! ' . $name . ' Client'];
    }
}
