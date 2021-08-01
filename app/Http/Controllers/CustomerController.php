<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Filters\CustomerFilters;

class CustomerController extends Controller
{
    
    public function index(CustomerFilters $filters)
    {
        //
        $customer   = Customer::filter($filters)->get();        
        $country    = $customer->pluck('country','country')->toArray();
        $state      = $customer->pluck('state','state')->toArray();
        return view('Customer.index',compact('customer','country','state'));
    }
   
    public function dataTable(CustomerFilters $filters)
    {
        //
        $customer   = Customer::filter($filters)->get();        
        return view('Customer.dataTable',compact('customer'));
    }
}
