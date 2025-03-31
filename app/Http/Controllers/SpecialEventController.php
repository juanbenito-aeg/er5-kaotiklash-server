<?php

namespace App\Http\Controllers;

use App\Models\SpecialEvent;
use Illuminate\Http\Request;

class SpecialEventController extends Controller
{
    public function index()
    {
        return SpecialEvent::orderBy("special_event_id", "asc")->get();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return SpecialEvent::findOrFail($id);
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
