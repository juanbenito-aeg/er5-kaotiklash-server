<?php

namespace App\Http\Controllers;

use App\Models\JosephChaoticEvent;
use Illuminate\Http\Request;

class JosephChaoticEventController extends Controller
{
    public function index()
    {
        return JosephChaoticEvent::with("mainCharacter")->get();
    }

    public function store(Request $request)
    {
       //
    }

    public function show(string $id)
    {
        return JosephChaoticEvent::with("mainCharacter")->findOrFail($id);
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
