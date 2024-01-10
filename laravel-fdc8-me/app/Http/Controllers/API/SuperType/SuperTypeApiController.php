<?php

namespace App\Http\Controllers\API\SuperType;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuperTypeResource;
// use App\Http\Resources\SuperTypeResource;
use App\Models\SuperType;
use Illuminate\Http\Request;

class SuperTypeApiController extends Controller
{
    public function index()
    {
        $superTypes = SuperType::select('name')->get();

        return SuperTypeResource::collection($superTypes);
    }
}
