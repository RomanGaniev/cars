<?php

namespace App\Services;

use App\Models\Make;
use App\Repositories\Makes\MakeRepositoryInterface;

class MakeService
{
    private $makeRepository;

    public function __construct(MakeRepositoryInterface $makeRepository)
    {
        $this->makeRepository = $makeRepository;
    }

    public function getAll()
    {
        return $this->makeRepository->getAll();
    }

    public function findMake(Make $make)
    {
        return $this->makeRepository->find($make);
    }

    public function storeMake(array $data)
    {
        return $this->makeRepository->storeFromArray($data);
    }

    public function updateMake(Make $make, array $data)
    {
        return $this->makeRepository->updateFromArray($make, $data);
    }

    public function destroyMake(Make $make)
    {
        $this->makeRepository->destroy($make);
    }
}
