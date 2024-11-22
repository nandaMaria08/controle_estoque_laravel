<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Mark;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public readonly Product $product;

    public function __construct(){
        $this->product = new Product();
    }
    public function index()
{
  
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
    public function store(Request $request)
    {
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'expiration_date' => $request->expiration_date,
        'quantity' => $request->quantity,
        'mark_id' => $request->mark_id, 
    ]);

    return redirect()->back()->with('message', 'Produto cadastrado com sucesso');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
