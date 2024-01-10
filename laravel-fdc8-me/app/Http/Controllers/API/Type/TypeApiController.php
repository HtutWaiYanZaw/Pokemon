<?php

namespace App\Http\Controllers\API\Type;

use App\Http\Controllers\Controller;
use App\Http\Resources\Type\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeApiController extends Controller
{
    public function index()
    {
        $superTypes = Type::select('name', 'photo')->get();

        return TypeResource::collection($superTypes);
    }
}
