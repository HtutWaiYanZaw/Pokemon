<?php

namespace App\Http\Controllers\API\Resistance;

use App\Http\Controllers\Controller;
use App\Http\Resources\resistance\ResistanceResource;
use App\Models\Resistance;
use Illuminate\Http\Request;

class ResistanceApiController extends Controller
{
    public function index()
{


    return ResistanceResource::collection(Resistance::all());
}
}
