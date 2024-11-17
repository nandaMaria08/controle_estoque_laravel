<?php

namespace App\Http\Controllers;
use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public readonly Mark $mark;

    public function __construct(){
        $this->mark = new Mark();
    }


    public function index()
    {
        $marks = $this->mark->all();
        return view('marks',['marks' => $marks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Mark $mark)
    {
        return view('mark_edit', ['mark' => $mark]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       var_dump($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
