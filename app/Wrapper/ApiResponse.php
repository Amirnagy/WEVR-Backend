<?php

namespace App\Wrapper;

use Illuminate\Database\Eloquent\Model;

class ApiResponse
{
    protected $model;

    public function __construct(Model $model,Model $model2)
    {
        $this->model = $model;

    }

    public function all()
    {
        $data = $this->model->all();
        // { id - location - type - rating } from Apartment
        // {current price - date and time from transaction Auction and Final Auction }

        // Customize the response data as per your requirements
        $modifiedData = $data->map(function ($item) {
            // Modify each item in the collection as needed
            // For example, you can add additional attributes or format existing ones
            return [
                'id' => $item->id,
                'name' => strtoupper($item->name),
                // Add more attributes as needed
            ];
        });

        return response()->json($modifiedData);
    }

}
