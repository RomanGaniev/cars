<?php

namespace App\Repositories\Cars;

use App\Models\Car;

interface CarRepositoryInterface
{
    public function getAll();
    public function find(Car $car);
    public function storeFromArray(array $data);
    public function updateFromArray(Car $car, array $data);
    public function destroy(Car $car);
}
