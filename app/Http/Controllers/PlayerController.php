<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    public function index()
    {
        return Player::all();
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $rules = [
            'name' => 'required|string|max:14',
            'email_address' => 'required|string|email|max:254|unique:players,email_address',
            'password' => 'required|string|min:6',
        ];
        
        $emailTakenErrorMessage = '';
        if ($request->preferred_language === 'eng') {
            $emailTakenErrorMessage = 'The email address has already been taken';
        } else {
            $emailTakenErrorMessage = 'Posta elektronikoa erabiltzen ari da';
        }
        $messages = [
            'email_address.unique' => $emailTakenErrorMessage,
        ];

        $validator = Validator::make($input, $rules, $messages);
        
        $errors = $validator->errors();

        $responseMessage = '';
        $responseStatusCode = '';

        if ($validator->fails()) {
            $responseMessage = $errors->first('email_address');
            $responseStatusCode = 409;
        } else {
            Player::create($request->all());
    
            if ($request->preferred_language === 'eng') {
                $responseMessage = 'Registration successful';
            } else {
                $responseMessage = 'Izen-ematea ondo egin da';
            }

            $responseStatusCode = 201;
        }

        return response()->json(['message' => $responseMessage], $responseStatusCode);
    }

    public function show(string $id)
    {
        return Player::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $player = Player::findOrFail($id);
        $player->update($request->all());

        return $player;
    }

    public function opponentsData(Request $request)
    {
        $idOfPlayerToExclude = $request->input('loggedInPlayerID');
        
        return Player::select('player_id','name')->where('player_id', '!=', $idOfPlayerToExclude)->get();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_address' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $player = Player::where('email_address', $request->email_address)
        ->where('password', $request->password)
        ->first();

        $responseData = ['message' => []];
        $responseStatusCode = -1;

        if ($player) {
            $responseData['message'] = ['Login successful', 'Saio-hasiera arrakastatsua'];

            $responseData['player'] = $player;

            $responseStatusCode = 200;
        } else {
            $responseData['message'] = ['Invalid credentials', 'Sarbide-datu baliogabeak'];

            $responseStatusCode = 401;
        }

        if ($request->preferred_language === 'eng') {
            $responseData['message'] = $responseData['message'][0];
        } else {
            $responseData['message'] = $responseData['message'][1];
        }

        return response()->json($responseData, $responseStatusCode);
    }
}
