<?php

namespace App\Repository;

use App\Models\LocationModel;

class LocationRepository
{
    private $data = array();

    public function get(int $id = null)
    {
        return LocationModel::where('id', $id)->firstOrFail();
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

    public function create(array $post = null)
    {
        $location = new LocationModel();
        $location->name = trim($post['name']);
        $location->latitude = $post['latitude'];
        $location->longitude = $post['longitude'];
        $location->marker_color = $post['markerColor'];
        return $location->push();
    }

    public function update(int $id = null, array $post = null)
    {
        $location = LocationModel::find($id);
        $location->name = trim($post['name']);
        $location->latitude = $post['latitude'];
        $location->longitude = $post['longitude'];
        $location->marker_color = $post['markerColor'];

        return $location->save();
    }

    public function delete(int $id = null)
    {
        /* Soft Delete */
        $location = LocationModel::find($id);
        $location->deleted_at = now();
        return $location->save();
    }

    public function dataTable(array $post = null)
    {
        $recordsTotal = LocationModel::where('id', '!=', 0)->count();
        if ($post['search']['value'] != '' && strlen(trim($post['search']['value'])) > 0) {
            $locations = LocationModel::select('locations.*')
                ->where('deleted_at', '=', null)
                ->where('locations.name', 'LIKE', '%' . $post['search']['value'] . '%')
                ->orderBy('id', 'ASC')
                ->skip(intval($post['start']))
                ->take(intval($post['length']))
                ->get();

            $recordsFiltered = LocationModel::select('locations.*')
                ->where('deleted_at', '=', null)
                ->where('locations.name', 'LIKE', '%' . $post['search']['value'] . '%')
                ->count();
        } else {
            $locations = LocationModel::select('locations.*')
                ->where('deleted_at', '=', null)
                ->orderBy('id', 'ASC')
                ->skip(intval($post['start']))
                ->take(intval($post['length']))
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
