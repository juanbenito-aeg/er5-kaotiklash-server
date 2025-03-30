<?php

namespace App\Http\Controllers;

use App\Models\MainCharacter;
use Illuminate\Http\Request;

class MainCharacterController extends Controller
{
    public function index()
    {
        return MainCharacter::with("chaoticEvents")->get();
    }

    public function store(Request $request)
    {
       //
    }

    public function show(string $id)
    {
        return MainCharacter::with("chaoticEvents")->findOrFail($id);
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
