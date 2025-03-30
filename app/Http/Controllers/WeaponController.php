<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index()
    {
        return Weapon::with("type")->get();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return Weapon::with("type")->findOrFail($id);
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
