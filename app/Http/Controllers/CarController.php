<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{

    private $carService;

    public function __construct(CarService $carService)
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $cars = $this->carService->getAll();

        return response()->json($cars, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCarRequest $request
     * @return JsonResponse
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->getFormData();
        $storedCar = $this->carService->storeCar($data);

        return response()->json($storedCar, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return JsonResponse
     */
    public function show(Car $car)
    {
        $car = $this->carService->findCar($car);

        return response()->json($car, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCarRequest $request
     * @param Car $car
     * @return JsonResponse
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->getFormData();
        $updatedCar = $this->carService->updateCar($car, $data);

        return response()->json($updatedCar, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return JsonResponse
     */
    public function destroy(Car $car)
    {
        $this->carService->destroyCar($car);

        return response()->json('Car deleted.', 200);
    }
}
