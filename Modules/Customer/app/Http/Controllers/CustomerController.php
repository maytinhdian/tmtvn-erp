<?php

namespace Modules\Customer\app\Http\Controllers;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Modules\Customer\app\Models\Customer;
use Modules\Customer\app\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public  $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->data = Customer::all();

        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $input = $request->all();
        
        $input['updated_at']=Date('Y-m-d H:i:s');
        $input['created_at']=Date('Y-m-d H:i:s');
        $this->data = Customer::create($input);
        Log::info($this->data);
        return response()->json($this->data);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        $this->data = Customer::find($id);

        return response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, $id): JsonResponse
    {
        //
        $product = Customer::find($id);
        $this->data = $product->update($request->all());
        return response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        //
        $this->data = Customer::destroy($id);
        return response()->json($this->data);
    }
    public function search($name)
    {
        //
        return Customer::where('name', 'like', '%' . $name . '%')->get();
    }
}
