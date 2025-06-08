<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{

    public readonly Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients', compact('clients'));
    }

    public function create()
    {
        return view('client_create');
    }

public function store(StoreUpdateClientRequest $request)
{
    $cleanPhone = preg_replace('/\D/', '', $request->phone); // remove tudo que não for número

    Client::create([
        'name' => $request->name,
        'phone' => $cleanPhone,
    ]);

    return redirect()->route('clients.index')->with('message', 'Cliente cadastrado(a) com sucesso');
}


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        // $clients = Client::all();
        return view('client_edit', compact('client'));
    }

public function update(StoreUpdateClientRequest $request, Client $client)
{
    $data = $request->except(['_token', '_method']);
    $data['phone'] = preg_replace('/\D/', '', $request->phone); // limpa a máscara

    $updated = $client->update($data);

    if ($updated) {
        return redirect()->route('clients.index')->with('message', 'Editado com sucesso');
    }

    return redirect()->back()->with('message', 'Erro');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->client->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('clients.index')->with('message', 'Excluído com sucesso!');
        }
        return redirect()->route('clients.index')->with('message', 'Erro ao excluir!');

    }
}