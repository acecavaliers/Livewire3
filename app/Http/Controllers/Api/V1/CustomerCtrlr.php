<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerCtrlr extends Controller
{
    //
    public function index(){
        $customers=Customer::all();
        return response()->json($customers);
    }

    public function view(Customer $customer){
        return response()->json($customer);
    }

    public function store(StoreCustomerRequest $request){
        Customer::create($request->validated());
        return response()->json('Created');
    }

    public function update(StoreCustomerRequest $request, Customer $customer){
        $customer->update($request->validated());
        return response()->json("Updated");
    }
}
