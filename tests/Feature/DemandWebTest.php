<?php

use App\Models\User;
use App\Models\Demand;
use App\Models\Mark;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});


test('usuário pode criar uma demanda', function () {
    $mark = Mark::factory()->create();

   $response = $this->post(route('demands.store'), [
    'type' => 'Requisição A',
    'arrival_date' => now()->toDateString(),
    'cycle' => '2025-1',
    'mark_id' => $mark->id,

    
]);
if ($response->getStatusCode() !== 302) {
    dump($response->getContent()); // vai mostrar erros de validação caso haja
}
$response->assertRedirect();


    $response->assertRedirect();
    $this->assertDatabaseHas('demands', [
        'type' => 'Requisição A',
        'cycle' => '2025-1',
        'mark_id' => $mark->id,
    ]);
});


test('usuário pode visualizar a lista de demandas', function () {
    Demand::factory()->count(2)->create();

    $response = $this->get('/demands');

    $response->assertOk();
    $response->assertSee('demand'); 
});


test('usuário pode editar uma demanda', function () {
    $demand = Demand::factory()->create([
        'type' => 'Antigo',
        'cycle' => '2024-2',
    ]);

$response = $this->put(route('demands.update', $demand->id), [
    'type' => 'Atualizado',
    'arrival_date' => now()->toDateString(),
    'cycle' => '2025-1',
    'mark_id' => $demand->mark_id,
]);


    $response->assertRedirect();
    $this->assertDatabaseHas('demands', [
        'id' => $demand->id,
        'type' => 'Atualizado',
        'cycle' => '2025-1',
    ]);
});

test('usuário pode deletar uma demanda', function () {
    $demand = Demand::factory()->create();

    $response = $this->delete("/demands/{$demand->id}");

    $response->assertRedirect(route('demands.index'));
    $this->assertDatabaseMissing('demands', ['id' => $demand->id]);
});
