<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = DB::table('customers')->select(
            'id',
            'customer_name',
            'cnic_passport',
            'country',
            'tel_no',
            'mobile',
            'email',
            'status'
        )->orderBy('id', 'DESC')->get();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => ['required'],
            'cnic_passport' => ['required'],
            'city' => ['required'],
            'mobile' => ['required'],
            'email' => ['required'],
            'country' => ['required'],
            'address' => ['required'],
        ]);

        $customer = Customer::create([
            'customer_name' => $request->customer_name,
            'cnic_passport' => $request->cnic_passport,
            'tel_no' => $request->tel_no,
            'city' => $request->city,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'country' => $request->country,
            'address' => $request->address,
            'notes' => $request->notes
        ]);
        
        if($customer) {
            return redirect('/admin/customer')->with('success', 'Customer added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Somthing wrong. Please retry');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Customer Deleted Successfully.');
    }

    public function getCustomers()
    {

        // return "sdfsadf";
        $customers = DB::table('customers')->where('status', 0)->select(
            'id',
            'customer_name'
        )->orderBy('id', 'DESC')->get();

        return $customers;
    }
}
