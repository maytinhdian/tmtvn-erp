<?php

namespace Modules\Customer\app\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Customer\app\Models\Asset;
use Modules\Customer\app\Models\Value;
use Modules\Customer\app\Models\Attribute;
use Modules\Customer\app\Http\Requests\AssetRequest;

class AssetController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->data = Asset::all();

        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetRequest $request)
    {
        $input = $request->all();

        $input['updated_at']=Date('Y-m-d H:i:s');
        $input['created_at']=Date('Y-m-d H:i:s');
        $this->data = Asset::create($input);
        Log::info($this->data);
        return response()->json($this->data);
    }

    public function storeAttribute(Request $request)
    {

        $request->validate([
            'attribute'=>'required|max:255',

        ]);
        $attributes = new Attribute();
        $attributes->attribute = $request->attribute;
        $attributes->save();
        return response()->json($attributes);

    }

    public function storeValue(Request $request)
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
        $this->data = Asset::find($id);

        return response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssetRequest $request, $id): JsonResponse
    {
        //
        $product = Asset::find($id);
        $this->data = $product->update($request->all());
        return response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        //
        $this->data = Asset::destroy($id);
        return response()->json($this->data);
    }
    public function search($name)
    {
        //
        return Asset::where('name', 'like', '%' . $name . '%')->get();
    }
}
