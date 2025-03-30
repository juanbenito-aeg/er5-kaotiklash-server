<?php

namespace App\Http\Controllers;

use App\Models\Armor;
use Illuminate\Http\Request;

class ArmorController extends Controller
{
    public function index()
    {
        return Armor::with("type")->get();
    }

    public function store(Request $request)
    {
       //
    }

    public function show(string $id)
    {
        return Armor::with("type")->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
       //
    }

    public function destroy(string $id)
    {
       //
    }
}
