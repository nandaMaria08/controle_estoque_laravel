<?php

use App\Models\User;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});


test('usuário pode criar um cliente', function () {
    $response = $this->post('/clients', [
        'name' => 'Maria da Silva',
        'phone' => '11999999999',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('clients', [
        'name' => 'Maria da Silva',
        'phone' => '11999999999',
    ]);
});


test('usuário pode ver a lista de clientes', function () {
    Client::factory()->create(['name' => 'João']);
    Client::factory()->create(['name' => 'Ana']);

    $response = $this->get('/clients');

    $response->assertOk();
    $response->assertSee('João');
    $response->assertSee('Ana');
});


test('usuário pode atualizar um cliente', function () {
    $client = Client::factory()->create([
        'name' => 'Antigo Nome',
        'phone' => '1100000000'
    ]);

    $response = $this->put("/clients/{$client->id}", [
        'name' => 'Novo Nome',
        'phone' => '11999999999',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('clients', [
        'id' => $client->id,
        'name' => 'Novo Nome',
        'phone' => '11999999999',
    ]);
});


test('usuário pode deletar um cliente', function () {
    $client = Client::factory()->create();

    $response = $this->delete("/clients/{$client->id}");

    $response->assertRedirect(route('clients.index'));
    $this->assertDatabaseMissing('clients', ['id' => $client->id]);
});
