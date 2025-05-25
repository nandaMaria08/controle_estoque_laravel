<?php

use App\Models\User;
use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});


test('usuário pode criar um empréstimo', function () {
    $response = $this->post('/loans', [
        'order' => 'Pedido 001',
        'person' => 'João da Silva',
        'date' => now()->toDateString(),
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('loans', [
        'order' => 'Pedido 001',
        'person' => 'João da Silva',
    ]);
});


test('usuário pode visualizar a lista de empréstimos', function () {
    Loan::factory()->create(['order' => 'Pedido A']);
    Loan::factory()->create(['order' => 'Pedido B']);

    $response = $this->get('/loans');

    $response->assertOk();
    $response->assertSee('Pedido A');
    $response->assertSee('Pedido B');
});

test('usuário pode editar um empréstimo', function () {
    $loan = Loan::factory()->create([
        'order' => 'Original',
        'person' => 'Maria',
    ]);

    $response = $this->put("/loans/{$loan->id}", [
        'order' => 'Atualizado',
        'person' => 'Maria Oliveira',
        'date' => now()->toDateString(),
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('loans', [
        'id' => $loan->id,
        'order' => 'Atualizado',
        'person' => 'Maria Oliveira',
    ]);
});


test('usuário pode deletar um empréstimo', function () {
    $loan = Loan::factory()->create();

    $response = $this->delete("/loans/{$loan->id}");

    $response->assertRedirect(route('loans.index'));
    $this->assertDatabaseMissing('loans', ['id' => $loan->id]);
});
