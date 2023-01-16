<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        return response()->json(Card::with('column')->orderBy('order')->get());
    }

    public function store(Request $request)
    {
        $card = Card::create($request->all());
        return response()->json($card);
    }

    public function show($id)
    {
        return response()->json(Card::with('column')->find($id));
    }

    public function update(Request $request, $id)
    {
        $card = Card::find($id);
        $card->update($request->all());
        return response()->json($card);
    }

    public function destroy($id)
    {
        Card::destroy($id);
        return response()->json(['success' => true]);
    }
}
