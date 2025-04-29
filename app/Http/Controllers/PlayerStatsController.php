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

    public function getTotalMatches($id)
    {

        $totalMatchesInP1 = PlayerStats::where('player_1', $id)->count();
        $totalMatchesInP2 = PlayerStats::where('player_2', $id)->count();
        $totalMatches = $totalMatchesInP1 + $totalMatchesInP2;
    
        if ($totalMatches == 0) {
            return response()->json(['message' => 'No matches found']);
        }
    
        return response()->json($totalMatches, 200);
    }
    
    public function getWinnedMatches($id)
    {

        $winnedMatches = PlayerStats::where('winner', $id)->count();
    
        if ($winnedMatches == 0) {
            return response()->json(['message' => 'No winned matches found']);
        }
    
        return response()->json($winnedMatches, 200);
    }
    
    public function getTotalPlayedRounds($id)
    {

        $playedRoundsAsP1 = PlayerStats::where('player_1', $id)->sum('played_rounds');
        $playedRoundsAsP2 = PlayerStats::where('player_2', $id)->sum('played_rounds');
        $totalPlayedRounds = $playedRoundsAsP1 + $playedRoundsAsP2;

        if ($totalPlayedRounds == 0) {
            return response()->json(['message' => 'No played rounds found']);
        }

        return response()->json($totalPlayedRounds, 200);
    }

    public function getJosephAppeared($id)
    {

        $josephAppearedInP1 = PlayerStats::where('player_1', $id)->where('joseph_appeared', true)->count();
        $josephAppearedInP2 = PlayerStats::where('player_2', $id)->where('joseph_appeared', true)->count();
        $totalJosephAppeared = $josephAppearedInP1 + $josephAppearedInP2;

        if ($totalJosephAppeared == 0) {
            return response()->json(['message' => 'Joseph did not appear in any game'], 400);
        }

        return response()->json($totalJosephAppeared, 200);
    }

    public function getTotalMinionsKilled($id)
    {

        $minionsKilledAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_minions_killed');
        $minionsKilledAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_minions_killed');
        $totalMinionsKilled = $minionsKilledAsP1 + $minionsKilledAsP2;

        if ($totalMinionsKilled == 0) {
            return response()->json(['message' => 'No minions killed found']);
        }

        return response()->json($totalMinionsKilled, 200);
    }

    public function getTotalFumbles($id)
    {

        $fumblesAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_fumbles');
        $fumblesAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_fumbles');
        $totalFumbles = $fumblesAsP1 + $fumblesAsP2;

        if ($totalFumbles == 0) {
            return response()->json(['message' => 'No fumbles found']);
        }
        return response()->json($totalFumbles, 200);
    }

    public function getTotalCriticalHits($id)
    {

        $critsAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_critical_hits');
        $critsAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_critical_hits');
        $totalCrits = $critsAsP1 + $critsAsP2;

        if ($totalCrits == 0) {
            return response()->json(['message' => 'No critical hits found']);
        }
        return response()->json($totalCrits, 200);
    }

    public function getTotalUsedCards($id)
    {

        $usedCardsAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_used_cards');
        $usedCardsAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_used_cards');
        $totalUsedCards = $usedCardsAsP1 + $usedCardsAsP2;

        return response()->json($totalUsedCards, 200);
    }

}
