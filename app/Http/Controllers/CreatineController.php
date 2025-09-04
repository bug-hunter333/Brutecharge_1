<?php

namespace App\Http\Controllers;

use App\Models\Creatine;

class CreatineController extends Controller
{
   public function index()
{
    $creatine = Creatine::findOrFail(1);
    return view('creatine.index', compact('creatine'));
}

}
