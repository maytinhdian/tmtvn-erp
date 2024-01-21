<?php

namespace Modules\Product\app\Http\Controllers;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Modules\Product\app\Models\Product;
use Modules\Product\app\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public  $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->data = Product::all();

        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $input['updated_at']=Date('Y-m-d H:i:s');
        $input['created_at']=Date('Y-m-d H:i:s');
        $this->data = Product::create($input);
        Log::info($this->data);
        return response()->json($this->data);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        $this->data = Product::find($id);

        return response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id): JsonResponse
    {
        //
        $product = Product::find($id);
        $this->data = $product->update($request->all());
        return response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        //
        $this->data = Product::destroy($id);
        return response()->json($this->data);
    }
    public function search($name)
    {
        //
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
