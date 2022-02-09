<?php

namespace App\Services;

use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Repositories\Cars\MakeRepositoryInterface;

class CarService
{
    private $carRepository;

    public function __construct(MakeRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getAll()
    {
        $cars = $this->carRepository->getAll();

        return CarResource::collection($cars);
    }

    public function findCar(Car $car)
    {
        $car = $this->carRepository->find($car);

        return new CarResource($car);
    }

    public function storeCar(array $data)
    {
        $storedCar = $this->carRepository->storeFromArray($data);

        return new CarResource($storedCar);
    }

    public function updateCar(Car $car, array $data)
    {
        $updatedCar = $this->carRepository->updateFromArray($car, $data);

        return new CarResource($updatedCar);
    }

    public function destroyCar(Car $car)
    {
        $this->carRepository->destroy($car);
    }
}
