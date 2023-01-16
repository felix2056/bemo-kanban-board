<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;
use App\Models\Card;

class ColumnController extends Controller
{
    public function index()
    {
        return response()->json(Column::with('cards')->get());
    }

    public function store(Request $request)
    {
        $column = Column::create($request->all());
        return response()->json($column);
    }

    public function show($id)
    {
        return response()->json(Column::with('cards')->find($id));
    }

    public function update(Request $request, $id)
    {
        $column = Column::find($id);
        $column->update($request->all());
        return response()->json($column);
    }

    public function destroy($id)
    {
        Column::destroy($id);
        Card::where('column_id', $id)->delete();
        return response()->json(['success' => true]);
    }
}
