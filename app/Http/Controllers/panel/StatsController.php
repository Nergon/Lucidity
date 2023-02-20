<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;

class StatsController extends Controller {
    public function index() {
        $lucidDreams = auth()->user()->entries()->where('lucidity','>',0)->count();
        $totalDreams = auth()->user()->entries()->count();
        $labelCount = auth()->user()->labels()->withCount('entries')->get();

        return view('panel.stats', ['lucidDreams' => $lucidDreams, 'totalDreams' => $totalDreams, 'labels' => $labelCount]);
    }
}
