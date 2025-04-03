<?php

namespace App\Http\Controllers;

use App\Models\Minion;
use Illuminate\Http\Request;

class MinionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Minion::with("category")->orderBy("minion_id", "asc")->get();
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
        return Minion::with("category")->findOrFail($id);
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
