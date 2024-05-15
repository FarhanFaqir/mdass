<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class RoomController extends Controller
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
            'floor',
            'fare',
            'type',
            'capacity',
            'is_reserved',
            'image',
            'services',
            'description'
        )->orderBy('id', 'DESC')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = DB::table('room_services')->select(
            'id',
            'icon',
            'title'
        )->get();
        return view('admin.rooms.create', compact('services'));
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
            'room_code' => ['required', 'string', 'unique:rooms',],
            'floor' => ['required'],
            'capacity' => ['required'],
            'fare' => ['required'],
            'type' => ['required'],
            'image' => ['required'],
        ],
        [
            'room_code.required' => 'This field is required',
            'floor.required' => 'This field is required',
            'fare.required' => 'This field is required'
        ]);

        //  converting intrested sectors from array to a string
        $services = "";
        if (count((array)$request->services)) {
            foreach ($request->services as $ser) {
                $services .= $ser . ",";
            }
        }

        $filenameWithExt = $request->file('image')->getClientOriginalName();

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('image')->getClientOriginalExtension();

        $filenameToStore = $filename.'_'.time().'.'.$extension;

        $request->file('image')->move(public_path('uploads/rooms'), $filenameToStore);

        $room = Room::create([
            'room_code' => $request->room_code,
            'floor' => $request->floor,
            'capacity' => $request->capacity,
            'fare' => $request->fare,
            'type' => $request->type,
            'image' => $filenameToStore,
            'services' => $services,
            'description' => $request->description
        ]);
        
        if($room) {
            return redirect('/admin/room')->with('success', 'Room added Successfully.');
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
        return "edit room";
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
        return redirect()->back()->with('success', 'Room Deleted Successfully.');
    }
}
