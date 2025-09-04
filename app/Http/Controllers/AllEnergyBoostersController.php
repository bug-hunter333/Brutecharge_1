<?php

namespace App\Http\Controllers;

use App\Models\AllEnergyBoosters;
use Illuminate\Http\Request;

class AllEnergyBoostersController extends Controller
{
    /**
     * Display all energy boosters
     */
    public function index()
    {
        $energyBoosters = AllEnergyBoosters::orderBy('created_at', 'desc')->get();
        
        return view('energy-boosters.all', compact('energyBoosters'));
    }

    /**
     * Display a specific energy booster
     */
    public function show($id)
    {
        $energyBooster = AllEnergyBoosters::findOrFail($id);
        
        return view('energy-boosters.show', compact('energyBooster'));
    }

    /**
     * API endpoint to get all energy boosters as JSON
     */
    public function apiIndex()
    {
        $energyBoosters = AllEnergyBoosters::orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'data' => $energyBoosters,
            'count' => $energyBoosters->count()
        ]);
    }
}