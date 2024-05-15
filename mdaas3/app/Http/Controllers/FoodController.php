<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\FoodCategory;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with('category')->get();

        return view('admin.food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('food_categories')->select(
            'id',
            'name',
        )->get();

        return view('admin.food.create', compact('categories'));
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
            'code' => ['required', 'string', 'unique:foods',],
            'food_name' => ['required'],
            'cost' => ['required'],
            'price' => ['required'],
            'category_id' => ['required'],
            'unit' => ['required'],
            'qty' => ['required'],
            'is_ready' => ['required'],
        ],
        [
            'category_id.required' => 'Category is required',
            'is_ready.required' => 'Is ready is required'
        ]);

        // $result = DB::insert('Insert INTO foods (
        //             code,
        //             food_name,
        //             cost,
        //             price,
        //             category_id,
        //             unit,
        //             qty,
        //             is_ready,
        //             duration,
        //             created_at,
        //             updated_at
        //         ) values (
        //             ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        //         )', [
        //             $request->code, 
        //             $request->food_name,
        //             $request->cost,
        //             $request->price,
        //             $request->category_id,
        //             $request->unit,
        //             $request->qty,
        //             $request->is_ready,
        //             $request->duration,
        //             NOW(),
        //             NOW()
        //         ]);

        $result = Food::create([
            'code' => $request->code,
            'food_name' => $request->food_name,
            'cost' => $request->cost,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'unit' => $request->unit,
            'qty' => $request->qty,
            'is_ready' => $request->is_ready,
            'duration' => $request->duration,
        ]);
        
        if($result) {
            return redirect('/admin/food')->with('success', 'Food Added Successfully.');
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
        return redirect()->back()->with('success', 'Food deleted Successfully.');
    }
}
