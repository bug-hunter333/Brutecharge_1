<?php

namespace App\Http\Controllers;

use App\Models\Creatine;
use App\Models\PreWorkout;

class PreWorkoutController extends Controller
{
   public function index()
{
    $preworkout = PreWorkout::findOrFail(1);
    return view('preworkout.index', compact('preworkout'));
}

}
