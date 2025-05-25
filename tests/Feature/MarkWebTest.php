<?php

use App\Models\User;
use App\Models\Mark;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});


test('usuário pode criar uma marca', function () {
    $response = $this->post('/marks', [
        'mark' => 'Marca de Teste',
    ]);

    $response->assertRedirect(); 
    $this->assertDatabaseHas('marks', [
        'mark' => 'Marca de Teste',
    ]);
});


test('usuário pode listar marcas', function () {
    Mark::factory()->create(['mark' => 'Marca A']);
    Mark::factory()->create(['mark' => 'Marca B']);

    $response = $this->get('/marks');

    $response->assertOk();
    $response->assertSee('Marca A');
    $response->assertSee('Marca B');
});


test('usuário pode editar uma marca', function () {
    $mark = Mark::factory()->create(['mark' => 'Original']);

    $response = $this->put("/marks/{$mark->id}", [
        'mark' => 'Editada',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('marks', ['mark' => 'Editada']);
});


test('usuário pode excluir uma marca', function () {
    $mark = Mark::factory()->create();

    $response = $this->delete("/marks/{$mark->id}");

    $response->assertRedirect(route('marks.index'));
    $this->assertDatabaseMissing('marks', ['id' => $mark->id]);
});
