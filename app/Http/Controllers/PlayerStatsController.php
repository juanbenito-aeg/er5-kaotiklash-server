<?php

namespace App\Http\Controllers;

use App\Models\PlayerStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerStatsController extends Controller
{
    public function index()
    {
        return PlayerStats::all();
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
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

        return response()->json(['message' => 'Stats deleted successfully'], 200);
    }

}
