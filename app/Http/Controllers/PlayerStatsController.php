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

        $playedRounds = [];

        $gameIds = PlayerStats::where('player_1', $id)->orWhere('player_2', $id)->get(['id'])->toArray();

        for ($i = 0; $i < count($gameIds); $i++) {
            $playedRoundsAsP1InGame = PlayerStats::where('id', $gameIds[$i])->where('player_1', $id)->sum('played_rounds');
            $playedRoundsAsP2InGame = PlayerStats::where('id', $gameIds[$i])->where('player_2', $id)->sum('played_rounds');

            array_push($playedRounds, $playedRoundsAsP1InGame + $playedRoundsAsP2InGame);
        }

        $averagePlayedRounds = $totalPlayedRounds / count($gameIds);
        $averagePlayedRounds = round($averagePlayedRounds, 2);

        $playedRoundsData = [
            'total_played_rounds' => $totalPlayedRounds,
            'played_rounds' => $playedRounds,
            'average_played_rounds' => $averagePlayedRounds,
        ];

        return response()->json($playedRoundsData, 200);
    }

    public function getJosephAppeared($id)
    {

        $josephAppearedInP1 = PlayerStats::where('player_1', $id)->where('joseph_appeared', true)->count();
        $josephAppearedInP2 = PlayerStats::where('player_2', $id)->where('joseph_appeared', true)->count();
        $totalJosephAppeared = $josephAppearedInP1 + $josephAppearedInP2;

        if ($totalJosephAppeared == 0) {
            return response()->json(['message' => 'Joseph did not appear in any game']);
        }

        $josephNotAppearedInP1 = PlayerStats::where('player_1', $id)->where('joseph_appeared', false)->count();
        $josephNotAppearedInP2 = PlayerStats::where('player_2', $id)->where('joseph_appeared', false)->count();
        $totalJosephNotAppeared = $josephNotAppearedInP1 + $josephNotAppearedInP2;
        
        $totalJoseph = $totalJosephAppeared + $totalJosephNotAppeared;
        $percentageJosephAppeared = ($totalJosephAppeared / $totalJoseph) * 100;
        $percentageJosephNotAppeared = ($totalJosephNotAppeared / $totalJoseph) * 100;
        $percentageJosephAppeared = round($percentageJosephAppeared, 2);
        $percentageJosephNotAppeared = round($percentageJosephNotAppeared, 2);

        $josephAppearedData = [
            'total_joseph_appeared' => $totalJosephAppeared,
            'total_joseph_not_appeared' => $totalJosephNotAppeared,
            'percentage_joseph_appeared' => $percentageJosephAppeared,
            'percentage_joseph_not_appeared' => $percentageJosephNotAppeared,
        ];

        return response()->json($josephAppearedData, 200);
    }

    public function getTotalMinionsKilled($id)
    {

        $minionsKilledAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_minions_killed');
        $minionsKilledAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_minions_killed');
        $totalMinionsKilled = $minionsKilledAsP1 + $minionsKilledAsP2;

        if ($totalMinionsKilled == 0) {
            return response()->json(['message' => 'No minions killed found']);
        }

        $minionsKilled = [];

        $gameIds = PlayerStats::where('player_1', $id)->orWhere('player_2', $id)->get(['id'])->toArray();

        for ($i = 0; $i < count($gameIds); $i++) {
            $minionsKilledAsP1InGame = PlayerStats::where('id', $gameIds[$i])->where('player_1', $id)->sum('player_1_minions_killed');
            $minionsKilledAsP2InGame = PlayerStats::where('id', $gameIds[$i])->where('player_2', $id)->sum('player_2_minions_killed');

            array_push($minionsKilled, $minionsKilledAsP1InGame + $minionsKilledAsP2InGame);
        }

        $averageMinionsKilled = $totalMinionsKilled / count($gameIds);
        $averageMinionsKilled = round($averageMinionsKilled, 2);

        $minionsKilledData = [
            'total_minions_killed' => $totalMinionsKilled,
            'minions_killed' => $minionsKilled,
            'average_minions_killed' => $averageMinionsKilled,
        ];
        return response()->json($minionsKilledData, 200);
    }

    public function getTotalFumbles($id)
    {

        $fumblesAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_fumbles');
        $fumblesAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_fumbles');
        $totalFumbles = $fumblesAsP1 + $fumblesAsP2;

        if ($totalFumbles == 0) {
            return response()->json(['message' => 'No fumbles found']);
        }

        $fumbles = [];

        $gameIds = PlayerStats::where('player_1', $id)->orWhere('player_2', $id)->get(['id'])->toArray();

        for ($i = 0; $i < count($gameIds); $i++) {
            $fumblesAsP1InGame = PlayerStats::where('id', $gameIds[$i])->where('player_1', $id)->sum('player_1_fumbles');
            $fumblesAsP2InGame = PlayerStats::where('id', $gameIds[$i])->where('player_2', $id)->sum('player_2_fumbles');

            array_push($fumbles, $fumblesAsP1InGame + $fumblesAsP2InGame);
        }

        $averageFumbles = $totalFumbles / count($gameIds);
        $averageFumbles = round($averageFumbles, 2);

        $fumblesData = [
            'total_fumbles' => $totalFumbles,
            'fumbles' => $fumbles,
            'average_fumbles' => $averageFumbles,
        ];

        return response()->json($fumblesData, 200);
    }

    public function getTotalCriticalHits($id)
    {

        $critsAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_critical_hits');
        $critsAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_critical_hits');
        $totalCrits = $critsAsP1 + $critsAsP2;

        if ($totalCrits == 0) {
            return response()->json(['message' => 'No critical hits found']);
        }
    
        $crits = [];

        $gameIds = PlayerStats::where('player_1', $id)->orWhere('player_2', $id)->get(['id'])->toArray();

        for ($i = 0; $i < count($gameIds); $i++) {
            $critsAsP1InGame = PlayerStats::where('id', $gameIds[$i])->where('player_1', $id)->sum('player_1_critical_hits');
            $critsAsP2InGame = PlayerStats::where('id', $gameIds[$i])->where('player_2', $id)->sum('player_2_critical_hits');

            array_push($crits, $critsAsP1InGame + $critsAsP2InGame);
        }

        $averageCrits = $totalCrits / count($gameIds);
        $averageCrits = round($averageCrits, 2);

        $critsData = [
            'total_critical_hits' => $totalCrits,
            'crits' => $crits,
            'average_critical_hits' => $averageCrits,
        ];

        return response()->json($critsData, 200);
    }

    public function getTotalUsedCards($id)
    {

        $usedCardsAsP1 = PlayerStats::where('player_1', $id)->sum('player_1_used_cards');
        $usedCardsAsP2 = PlayerStats::where('player_2', $id)->sum('player_2_used_cards');
        $totalUsedCards = $usedCardsAsP1 + $usedCardsAsP2;

        if ($totalUsedCards == 0) {
            return response()->json(['message' => 'No used cards found']);
        }

        $usedCards = [];

        $gameIds = PlayerStats::where('player_1', $id)->orWhere('player_2', $id)->get(['id'])->toArray();

        for ($i = 0; $i < count($gameIds); $i++) {
            $usedCardsAsP1InGame = PlayerStats::where('id', $gameIds[$i])->where('player_1', $id)->sum('player_1_used_cards');
            $usedCardsAsP2InGame = PlayerStats::where('id', $gameIds[$i])->where('player_2', $id)->sum('player_2_used_cards');

            array_push($usedCards, $usedCardsAsP1InGame + $usedCardsAsP2InGame);
        }

        $averageUsedCards = $totalUsedCards / count($gameIds);
        $averageUsedCards = round($averageUsedCards, 2);

        $usedCardsData = [
            'total_used_cards' => $totalUsedCards,
            'used_cards' => $usedCards,
            'average_used_cards' => $averageUsedCards,
        ];


        return response()->json($usedCardsData, 200);
    }

}
