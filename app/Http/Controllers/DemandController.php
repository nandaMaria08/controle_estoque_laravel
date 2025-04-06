<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDemandRequest;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Demand;
use Carbon\Carbon;


class DemandController extends Controller
{
    public readonly Demand $demands;

    public function __construct(Demand $demands){
        $this->demands = new Demand();
    }
    public function index()
    {
        Carbon::setLocale('pt_BR');

        $demands = Demand::with('mark')->get();

        return view('demands', compact('demands'));

    }

    public function create()
    {
        $marks = Mark::all();

        return view('demands_create', compact('marks'));
    }

   
    public function store(StoreUpdateDemandRequest $demands)
    {
        Demand::create([
            'type' => $demands->type,
            'arrival_date' => $demands->arrival_date,
            'cycle' => $demands->cycle

        ]);
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
