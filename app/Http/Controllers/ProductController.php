<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Mark;
use App\Http\Requests\StoreUpdateProductRequest;
use Carbon\Carbon;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public readonly Product $product;

    public function __construct(){
        $this->product = new Product();
    }
    public function index()
{
    Carbon::setLocale('pt_BR');
  
    $products = Product::with('mark')->get();
    
    return view('products', compact('products'));
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $marks = Mark::all();

        return view('product_create', compact('marks'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(StoreUpdateProductRequest $request)
{

    $price = str_replace(['R$', '.', ','], ['', '', '.'], $request->price);

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $price, 
        'expiration_date' => $request->expiration_date,
        'quantity' => $request->quantity,
        'mark_id' => $request->mark_id, 
    ]);

    return redirect()->route('products.index')->with('message', 'Produto cadastrado com sucesso');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $marks = Mark::all();
        return view('product_edit', compact('marks', 'product'));
        
    }

    /**
     * Update the specified resource in storage.
     */
public function update(StoreUpdateProductRequest $request, string $id)
{
    $data = $request->except(['_token', '_method']);

    // Converte "R$ 12,34" para "12.34"
    $data['price'] = str_replace(['R$', '.', ','], ['', '', '.'], $data['price']);

    $updated = $this->product->where('id', $id)->update($data);

    if ($updated) {
        return redirect()->route('products.index')->with('message', 'Editado com sucesso');
    }

    return redirect()->back()->with('message', 'Erro');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->product->where('id', $id)->delete();

        if($deleted){
            return redirect()->route('products.index')->with('message', 'Excluído com sucesso!');
        }
    
        return redirect()->route('products.index')->with('message', 'Erro ao excluir!');
    }
}
