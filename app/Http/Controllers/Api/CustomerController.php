<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->firstName) {
            $query->where('first_name', $request->firstName);
        }

        if ($request->lastName) {
            $query->where('last_name', $request->lastName);
        }

        if ($request->age) {
            $query->where('age', $request->age);
        }

        return CustomerResource::collection($query->paginate());
        // return CustomerResource::collection(Customer::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        return CustomerResource::make(
            Customer::create([
                "first_name" => $request->firstName,
                "last_name" => $request->lastName,
                "age" => $request->age,
                "email" => $request->email,
                "password" => $request->password,
                "phone" => $request->phone,
                "address" => $request->address
            ])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return CustomerResource::make($customer);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        if (isset($request->firstName)){
            $customer->first_name = $request->firstName;
        }
        if (isset($request->lastName)){
            $customer->last_name = $request->lastName;
        }
        if (isset($request->age)){
            $customer->age = $request->age;
        }
        if (isset($request->email)){
            $customer->email = $request->email;
        }
        if (isset($request->password)){
            $customer->password = $request->password;
        }
        if (isset($request->phone)){
            $customer->phone = $request->phone;
        }
        if (isset($request->address)){
            $customer->address = $request->address;
        }

        $customer->save();

        return CustomerResource::make($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        throw new HttpResponseException(response()->json([
            'success' => true,
            'message' => 'This user has been deleted',
        ]));
    }
}
