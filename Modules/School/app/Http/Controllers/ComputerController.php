<?php

namespace Modules\School\app\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Modules\School\app\Models\Computer;
use Modules\School\app\Http\Requests\ComputerRequest;

class ComputerController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->data = Computer::all();

        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComputerRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['updated_at'] = Date('Y-m-d H:i:s');
        $input['created_at'] = Date('Y-m-d H:i:s');
        $this->data = Computer::create($input);
        Log::info($this->data);
        return response()->json($this->data);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        //
        $this->data = Computer::select("*")
            ->where([
                ["id", "=", $id],
            ])
            ->get();
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
    public function search(Request $request)
    {
        $request->validate([
            'mac_address' => 'required|max:20',

        ]);
        $macAddress = Str::upper($request->mac_address);


        $computer = Computer::select("*")
            ->where([
                ["mac_address", "=", $macAddress],
            ])
            ->get();
        return $computer;
    }
}
