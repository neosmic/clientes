<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCitiesRequest;
use App\Http\Requests\UpdateCitiesRequest;
use App\Models\Cities;
use Exception;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Cities $cities)
    {
        $cities = $cities->all();
        return $cities;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitiesRequest $request)
    {
        $data = $request->only(['name']);
        $city = Cities::create($data);
        $city->save();
        return json_encode(['message' => 'Stored ' . $data['name'] . ' City!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cities $cities, $cod)
    {
        $city = $cities->where('cod', '=', $cod)->get();
        return $city;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitiesRequest $request, Cities $cities, $cod)
    {
        $exist = Cities::where('cod', $cod)->first();
        if (empty($exist)) {
            throw new Exception('error: City does not exist');
        }
        $name = $request->get('name');
        Cities::where('cod', $cod)
            ->update(['name' => $name]);

        return json_encode(['message' => 'Updated! ' . $name . ' City']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cities $cities, $cod)
    {
        $exist = Cities::where('cod', $cod)->first();
        if (empty($exist)) {
            throw new Exception('error: City does not exist');
        }
        $name = $exist['name'];

        Cities::where('cod', $cod)->delete();

        return json_encode(['message' => 'Deleted! ' . $name . ' City']);
    }
}
