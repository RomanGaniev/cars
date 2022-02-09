<?php

namespace App\Repositories\Makes;

use App\Models\Make;

interface MakeRepositoryInterface
{
    public function getAll();
    public function find(Make $make);
    public function storeFromArray(array $data);
    public function updateFromArray(Make $make, array $data);
    public function destroy(Make $make);
}
