<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::select(DB::raw('DATE(visited_date) as date'),
        DB::raw('count(*) as count'))
          ->groupBy(DB::raw('DATE(visited_date)'))
          ->orderBy('date','desc')
          ->paginate(20);

$customers = Customer::latest()->get();
return view('customer',compact('customers'));
    }

}
