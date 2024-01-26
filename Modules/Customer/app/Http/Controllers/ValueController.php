<?php

namespace Modules\Customer\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Customer\app\Models\Value;

class ValueController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->data = Value::all();

        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'value'=>'required|max:255',
            'attribute_id'=>"required|integer",
            'asset_id'=>"required|integer",
        ]);
        $values = new Value();
        $values->value = $request->value;
        $values->save();
        $values->attributes()->attach(
            $request->attribute_id,
            ['created_id'=>auth()->user()->id],
            ['asset_id'=>$request->asset_id,
        ]);//TODO
        return response()->json($values);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        //

        return response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        //

        return response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        //

        return response()->json($this->data);
    }
}
