<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;
use App\Models\Product;

class MotorController extends Controller
{
    public function index($id)
    {
        $motorcycles = Motorcycle::where('product_id', $id)
            ->leftJoin('orders', 'motorcycles.id', '=', 'orders.motorcycle_id')
            ->whereNull('orders.motorcycle_id')
            ->select('motorcycles.*')
            ->get();

        return view('motorcycle', compact('motorcycles'));
    }
}
