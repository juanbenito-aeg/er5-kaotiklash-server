<?php

namespace App\Http\Controllers;

use App\Models\RareEvent;
use Illuminate\Http\Request;

class RareEventController extends Controller
{
    public function index()
    {
        return RareEvent::orderBy("rare_event_id", "asc")->get();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return RareEvent::findOrFail($id);
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
