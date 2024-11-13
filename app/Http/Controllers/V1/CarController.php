<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Resources\v1\CarResource;
use App\Http\Resources\v1\OneCarResource;

class CarController extends Controller
{    
    /**
     * index
     *
     * @return Response
     */
    public function index(){
        return response()->json([CarResource::collection(Car::all())]);
    }
    
    /**
     * show
     *
     * @param  Car $car
     * @return Response
     */
    public function show(Car $car){
        return response()->json([new OneCarResource($car)]);
    }
}
