<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutritionController extends Controller
{
    public function index()
    {
        return view('nutrition.index'); // resources/views/nutrition.blade.php
    }
}
