<?php

namespace App\Http\Controllers\API\Weakness;

use App\Http\Controllers\Controller;
use App\Http\Resources\weakness\WeaknessResource;
use App\Models\Weakness;
use Illuminate\Http\Request;

class WeaknessApiController extends Controller
{
    public function index()
{
    return WeaknessResource::collection(Weakness::all());
}
}
