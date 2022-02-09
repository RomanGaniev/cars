<?php

namespace App\Repositories\Makes;

use App\Models\Make;

class EloquentMakeRepository implements MakeRepositoryInterface
{

    public function getAll()
    {
        return Make::all();
    }

    public function find(Make $make)
    {
        return $make;
    }

    public function storeFromArray(array $data)
    {
        return Make::query()->create($data);
    }

    public function updateFromArray(Make $make, array $data)
    {
        return $make->update($data);
    }

    public function destroy(Make $make)
    {
        $make->delete();
    }
}
