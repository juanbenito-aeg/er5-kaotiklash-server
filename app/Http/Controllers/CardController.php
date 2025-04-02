<?php

namespace App\Http\Controllers;

use App\Models\MainCharacter;
use App\Models\Minion;
use App\Models\Weapon;
use App\Models\Armor;
use App\Models\RareEvent;
use App\Models\SpecialEvent;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return response()->json([
          'main_characters' => MainCharacter::with('chaoticEvents')
            ->orderBy('main_character_id', 'asc')
            ->get(),
            'minions' => Minion::with('category')
            ->orderBy('minion_id', 'asc')->get(),
            'weapons' => Weapon::with('type')
            ->orderBy('id', 'asc')->get(),
            'armor' => Armor::with('armor')
            ->orderBy('id', 'asc')->get(),
            'rare_events' => RareEvent::orderBy('rare_event_id', 'asc')->get(),
            'special_events' => SpecialEvent::orderBy('special_event_id', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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