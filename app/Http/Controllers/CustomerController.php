<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function search(Request $request)
    {
        $query = Customer::with('orders.items');
        
        $query->when($request->filled('email'), function ($q) use ($request) {
            $q->where('email', 'like', '%' . $request->input('email') . '%');
        })
        
        ->when($request->filled('order_number'), function ($q) use ($request) {
            $q->whereHas('orders', function ($q) use ($request) {
                $q->where('order_number', 'like', '%' . $request->input('order_number') . '%');
            });
        })
        
        ->when($request->filled('item_name'), function ($q) use ($request) {
            $q->whereHas('orders.items', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('item_name') . '%');
            });
        });
        $customers = $query->get();
        return view('customers.index', compact('customers'));
    }
}
