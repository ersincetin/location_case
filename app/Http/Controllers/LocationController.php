<?php

namespace App\Http\Controllers;

use App\Models\LocationModel;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $data = array();

    public function get(Request $request)
    {
        return LocationModel::where('id', $request->get('id'))->firstOrFail();
    }

    public function list()
    {
        return LocationModel::select('id', 'name', 'latitude', 'longitude', 'marker_color')
            ->where([
                ['deleted_at', '=', null]
            ])
            ->orderBy('id', 'ASC')
            ->get();
    }

    public function create(Request $request)
    {
        $location = new LocationModel();
        $location->name = trim($request->post("name"));
        $location->latitude = $request->post("latitude");
        $location->longitude = $request->post("longitude");
        $location->marker_color = $request->post("markerColor");
        $location->push();
    }

    public function update(Request $request)
    {
        $location = LocationModel::find($request->post('id'));
        $location->name = trim($request->post('name'));
        $location->latitude = $request->post('latitude');
        $location->longitude = $request->post('longitude');
        $location->marker_color = $request->post('markerColor');

        return $location->save();
    }

    public function delete(Request $request)
    {
        /* Soft Delete */
        $location = LocationModel::find($request->post('id'));
        $location->deleted_at = now();
        return $location->save();
    }

    public function dataTable(Request $request)
    {
        $recordsTotal = LocationModel::where('id', '!=', 0)->count();
        if ($request->post('searchValue') != '' && strlen(trim($request->post('searchValue'))) > 0) {
            $locations = LocationModel::select('locations.*')
                ->where('deleted_at', '=', null)
                ->where('locations.name', 'LIKE', '%' . $request->post('searchValue') . '%')
                ->orderBy('id', 'ASC')
                ->skip(intval($request->post('start')))
                ->take(intval($request->post('length')))
                ->get();

            $recordsFiltered = LocationModel::select('locations.*')
                ->where('deleted_at', '=', null)
                ->where('locations.name', 'LIKE', '%' . $request->post('searchValue') . '%')
                ->count();
        } else {
            $locations = LocationModel::select('locations.*')
                ->where('deleted_at', '=', null)
                ->orderBy('id', 'ASC')
                ->skip(intval($request->post('start')))
                ->take(intval($request->post('length')))
                ->get();
            $recordsFiltered = $recordsTotal;
        }

        $output = array(
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
        );

        $i = 1;
        foreach ($locations as $location) {
            $row = array();
            $row['orderNumber'] = $i++;
            $row['name'] = $location->name;
            $row['latitude'] = $location->latitude;
            $row['longitude'] = $location->longitude;
            $row['markerColor'] = '<i class="fa fa-map-marker fa-2x" aria-hidden="true" style="color: ' . $location->marker_color . '"></i>';
            $row['edit'] = '<a href="javascript:;" class="btn btn-sm btn-icon ms-3" onclick="editLocation(' . $location->id . ')"><i class="fas fa fa-edit text-warning fa-1xx" title="Edit"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-icon ms-3" onclick="deleteLocation(' . $location->id . ')"><i class="fas fa fa-trash text-danger fa-1x" title="Delete"></i></a>';
            $this->data[] = $row;
        }
        $output["data"] = $this->data;
        return $output;
    }
}
