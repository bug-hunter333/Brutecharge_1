<?php

namespace App\Http\Controllers;

use App\Models\Creatine;
use App\Models\PreWorkout;
use App\Models\Protein;

class ProteinController extends Controller
{
   public function index()
{
    $protein = Protein::findOrFail(1);
    return view('protein.index', compact('protein'));
}

}
