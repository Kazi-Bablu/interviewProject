<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customer.view', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'phone_number' => 'required|unique:customers,phone_number',
            'customer_image' => 'required'
        ]);

        $customerFirstThreeWord = substr("$request->name", 0, 3);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->customer_unique_id = $customerFirstThreeWord . '' . random_int(0, 100000);
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->save();

        $img_bluebook = $request->file('customer_image');
        $customer_image = '';
        if ($img_bluebook) {
            $customerById = Customer::find($customer->id);
            // Image upload
            $img_bluebook_extension = $img_bluebook->clientExtension();
            $img_bluebook_name = 'customer_image' . $customer->id . '.' . $img_bluebook_extension;
            $upload_path = 'storage/images/customer/';
            $img_bluebook->move($upload_path, $img_bluebook_name);
            $customer_image = $upload_path . $img_bluebook_name;
            $customerById->customer_image = $customer_image;
            $customerById->save();
        }


        flash('New customer added successfully!')->success()->important();
        return redirect()->back();
    }


}
