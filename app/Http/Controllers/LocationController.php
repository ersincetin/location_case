<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function get(Request $request)
    {
        return $this->locationService->get($request->post('id'));
    }

    public function list()
    {
        return $this->locationService->list();
    }

    public function create(LocationRequest $request)
    {
        return $this->locationService->create($request->post());
    }

    public function update(LocationRequest $request)
    {
        return $this->locationService->update($request->post('id'), $request->post());
    }

    public function delete(Request $request)
    {
        return $this->locationService->delete($request->post('id'));
    }

    public function dataTable(Request $request)
    {
        return $this->locationService->dataTable($request->post());
    }
}
