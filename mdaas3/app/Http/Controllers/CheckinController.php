<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Customer;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = DB::table('rooms')->select(
            'id',
            'room_code',
            'floor'
        )->orderBy('floor', 'ASC')->where('is_reserved', 0)->get();

        // $customers = DB::table('customers')->select(
        //     'id',
        //     'customer_name'
        // )->orderBy('id', 'DESC')->where('status', 0)->get();

        return view('admin.checkin.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'room' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'adults' => ['required'],
            'customer' => ['required'],
        ]);

        $reservations = Reservation::create([
            'room_id' => $request->room,
            'customer_id' => $request->customer,
            'checkin_date' => $request->date,
            'checkin_time' => $request->time,
            'days' => $request->days,
            'hours' => $request->hours,
            'adults' => $request->adults,
            'childrens' => $request->childrens,
            'deposite' => $request->deposite,
            'vehicle_no' => $request->vehicle_no,
            'reference' => $request->reference,
            'description' => $request->description,
        ]);
        
        if($reservations) {
            Room::where('id', $request->room)->update([
                'is_reserved' => 1
            ]);
            Customer::where('id', $request->customer)->update([
                'status' => 1
            ]);
            return redirect('/admin/checkin')->with('success', 'Customer Reservation Added Successfully.');
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
        //
    }
}
