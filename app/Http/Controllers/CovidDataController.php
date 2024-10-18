<?php

namespace App\Http\Controllers;

use App\Models\CovidData;
use Illuminate\Http\Request;

class CovidDataController extends Controller
{
    // Method untuk mengambil semua data
    public function index()
    {
        // Mengambil semua data dari tabel covid_data
        $data = CovidData::all();
        
        // Mengembalikan data dalam format JSON
        return response()->json($data, 200);
    }
}
