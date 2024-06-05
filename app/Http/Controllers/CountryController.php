<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Response::api([
            'message' => 'All countries',
            'data' => Country::all()
        ]);
    }
}
