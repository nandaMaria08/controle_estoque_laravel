<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Mark;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->user = User::factory()->create();
    $this->mark = Mark::factory()->create();
    $this->actingAs($this->user);
});


test('usuário pode criar um produto', function () {
    $response = $this->post('/products', [
        'name' => 'Produto Teste',
        'description' => 'Descrição teste',
        'price' => 49.99,
        'expiration_date' => now()->addMonth()->format('Y-m-d'),
        'quantity' => 10,
        'mark_id' => $this->mark->id,
    ]);

    $response->assertRedirect(); 
    $this->assertDatabaseHas('products', [
        'name' => 'Produto Teste',
        'mark_id' => $this->mark->id,
    ]);
});


test('usuário pode listar produtos', function () {
    Product::factory()->create(['name' => 'Produto 1', 'mark_id' => $this->mark->id]);
    Product::factory()->create(['name' => 'Produto 2', 'mark_id' => $this->mark->id]);

    $response = $this->get('/products');

    $response->assertOk();
    $response->assertSee('Produto 1');
    $response->assertSee('Produto 2');
});


test('usuário pode editar um produto', function () {
    $product = Product::factory()->create([
        'name' => 'Produto Antigo',
        'mark_id' => $this->mark->id,
    ]);

    $response = $this->put("/products/{$product->id}", [
        'name' => 'Produto Novo',
        'description' => 'Nova descrição',
        'price' => 99.99,
        'expiration_date' => now()->addMonths(2)->format('Y-m-d'),
        'quantity' => 5,
        'mark_id' => $this->mark->id,
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('products', ['name' => 'Produto Novo']);
});


test('usuário pode deletar um produto', function () {
    $product = Product::factory()->create(['mark_id' => $this->mark->id]);

    $response = $this->delete("/products/{$product->id}");

    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseMissing('products', ['id' => $product->id]);
});
