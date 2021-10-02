<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->get();

        return response()->json($customers, 200);
    }

    public function show($id)
    {
        $customer = $this->customer->find($id);

        $statusCode = 200;

        if (!$customer) {
            $statusCode = 404;
        }

        return response()->json($customer, $statusCode);
    }

    public function store(Request $request)
    {
        $customer = $this->customer->create($request->all());

        $statusCode = 201;

        if (!$customer) {
            $statusCode = 500;
        }

//        return response()->json($customer, $statusCode);
        return response()->json([
            'customer_id' => $customer['id'],
            'status' => $statusCode,
        ]);
    }

//    public function update(Request $request, $id)
    public function update(Request $request)
    {
        $id = $request->id;

        $this->customer->where('id', $id)->update(
            ['first_name' => $request->first_name, 'last_name' => $request->last_name],
        );

        $customer = $this->customer->find($id);

        $statusCode = 201;

        if (!$customer) {
            $statusCode = 500;
        }

//        return response()->json($customer, $statusCode);
        return response()->json($statusCode);
    }

    public function destroy($id)
    {
        $customer = $this->customer->find($id);

        $statusCode = 404;
        $message = "User not found";

        if ($customer) {
            $this->customer->destroy($id);
            $statusCode = 200;
            $message = "Delete success!";
        }

        return response()->json($message, $statusCode);
    }

    // AJAX

    public function getlist()
    {
        $customers = $this->customer->get();

        return view('customer/list', ['customers' => $customers]);
    }
}
