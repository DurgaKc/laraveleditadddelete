<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Sample data for the pie chart
        $data = [
            'labels' => ['present', 'absent', 'Leave','require'],
            'datasets' => [[
                'data' => [400, 50, 100,200],
                'backgroundColor' => ['green', 'red', '#FFCE56','aqua'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56'],
            ]]
        ];

        return view('piechart', compact('data'));
    }
}


