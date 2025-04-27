<?php

namespace App\Http\Controllers;

use App\Models\PlayerStats;
use Illuminate\Http\Request;

class PlayerStatsController extends Controller
{
    public function index()
    {
        return PlayerStats::all();
    }

    public function store(Request $request)
    {
        PlayerStats::create($request->all());
    }

    public function show(string $id)
    {
        return PlayerStats::findOrFail($id);
    }

    public function destroy(string $id)
    {
        $playerStats = PlayerStats::findOrFail($id);
        $playerStats->delete();

        return response()->json(['message' => 'Stats successfully deleted'], 200);
    }
}
