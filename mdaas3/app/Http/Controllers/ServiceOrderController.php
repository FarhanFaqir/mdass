<?php

namespace App\Http\Controllers;
;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\ServiceOrder;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = DB::table('foods')->select(
            'id',
            'food_name',
            'unit',
            'price'
        )->orderBy('id', 'DESC')->where('is_ready', 1)->get();

        $customers = DB::table('customers')->select(
            'id',
            'customer_name'
        )->orderBy('id', 'DESC')->where('status', 1)->get(); 

        return view('admin.serviceOrder.index', compact('foods', 'customers'));
        // $orders = ServiceOrder::with('reservation','food')->get();
        // return $orders;
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
        $data = json_decode($request->data);
        // return $data;
        
        $reservation = Reservation::where('customer_id', $data->customer_id)->where('status', 1)->get();
        if(count($reservation) > 0){
            $d = $data->tableArray;
            foreach($data->tableArray as $d){
                $order = new ServiceOrder();
                $order->reservation_id = $reservation[0]->id;
                $order->food_id = $d->{'1'};
                $order->name = $d->{'2'};
                $order->price = $d->{'3'};
                $order->qty = $d->{'4'};
                $order->discount = $d->{'5'};
                $order->sub_total = $d->{'6'};
                $order->save();
            }

            return redirect('/admin/serviceorder')->with('success', 'Order Placed Successfully.');
        }else {
            return redirect()->back()->with('error', 'Customer Reservation Not Found');
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
