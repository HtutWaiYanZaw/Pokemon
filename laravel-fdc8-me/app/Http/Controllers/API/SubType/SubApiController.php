<?php

namespace App\Http\Controllers\API\SubType;

use App\Http\Controllers\Controller;
use App\Http\Resources\subtype\SubTypeResource;
use App\Models\SubType;
use Illuminate\Http\Request;

class SubApiController extends Controller
{
    public function index()
{
    $superTypes = SubType::select('name')->get();

    return SubTypeResource::collection($superTypes);
}
}
