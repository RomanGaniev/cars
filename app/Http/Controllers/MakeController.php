<?php

namespace App\Http\Controllers;

use App\Http\Requests\Make\StoreMakeRequest;
use App\Http\Requests\Make\UpdateMakeRequest;
use App\Models\Make;
use App\Services\MakeService;
use Illuminate\Http\JsonResponse;

class MakeController extends Controller
{
    private $makeService;

    public function __construct(MakeService $makeService)
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->makeService = $makeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->makeService->getAll();

        return response()->json($cars, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMakeRequest $request
     * @return JsonResponse
     */
    public function store(StoreMakeRequest $request)
    {
        $data = $request->getFormData();
        $storedMake = $this->makeService->storeMake($data);

        return response()->json($storedMake, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Make $make
     * @return JsonResponse
     */
    public function show(Make $make)
    {
        $make = $this->makeService->findMake($make);

        return response()->json($make, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMakeRequest $request
     * @param Make $make
     * @return JsonResponse
     */
    public function update(UpdateMakeRequest $request, Make $make)
    {
        $data = $request->getFormData();
        $updatedMake = $this->makeService->updateMake($make, $data);

        return response()->json($updatedMake, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Make $make
     * @return JsonResponse
     */
    public function destroy(Make $make)
    {
        $this->makeService->destroyMake($make);

        return response()->json('Make deleted.', 200);
    }
}
