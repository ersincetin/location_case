<?php

namespace App\Services;

use App\Repository\LocationRepository;
use App\Services\Interface\ILocationService;

class LocationService implements ILocationService
{
    protected $locationRepository;

    public function __construct()
    {
        $this->locationRepository = new LocationRepository();
    }

    public function get(int $id = null)
    {
        return $this->locationRepository->get($id);
    }

    public function list()
    {
        return $this->locationRepository->list();
    }

    public function create(array $post = null)
    {
        return $this->locationRepository->create($post);
    }

    public function update($id = null, array $post = null)
    {
        return $this->locationRepository->update($id, $post);
    }

    public function delete(int $id = null)
    {
        return $this->locationRepository->delete($id);
    }

    public function dataTable(array $post = null)
    {
        return $this->locationRepository->dataTable($post);
    }
}
