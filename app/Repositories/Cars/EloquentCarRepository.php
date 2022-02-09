<?php

namespace App\Repositories\Cars;

use App\Models\Car;

class EloquentCarRepository implements CarRepositoryInterface
{

    public function getAll()
    {
        return Car::all();
    }

    public function find(Car $car)
    {
        return $car;
    }

    public function storeFromArray(array $data)
    {
        return Car::query()->create($data);
    }

    public function updateFromArray(Car $car, array $data)
    {
        return $car->update($data);
    }

    public function destroy(Car $car)
    {
        $car->delete();
    }
}
