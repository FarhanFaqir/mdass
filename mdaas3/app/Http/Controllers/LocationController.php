<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::get();
        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
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
            'location_name' => ['required', 'unique:locations'],
            'division' => ['required'],
            'district' => ['required'],
            'tehsil' => ['required'],
            'mineral' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ],
        [
            'location_name.required' => 'Location is required',
            'division.required' => 'Division is required',
            'district.required' => 'District is required',
            'tehsil.required' => 'Tehsil is required',
            'mineral.required' => 'Mineral is required',
            'latitude.required' => 'Latitude is required',
            'longitude.required' => 'Longitude is required',
        ]);

        $result = Location::create([
            'location_name' => $request->location_name,
            'division' => $request->division,
            'district' => $request->district,
            'tehsil' => $request->tehsil,
            'mineral' => $request->mineral,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
        ]);
        
        if($result) {
            return redirect('/admin/location')->with('success', 'Location Added Successfully.');
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

    public function search()
    {
        $locations = Location::get();
        return view('admin.location.search', compact('locations'));
    }

    public function searchMap()
    {
        $locations = Location::where('status', 1);
        $id = Auth::id();
        if(!$id) $id = 0;

        $locations = $locations->get();

        return view('map', compact('locations','id'));
    }

    public function searchFilter(Request $request)
    {
        $locations = Location::where('status', 1);

        if ($request->division) {
            $locations->where('division', $request->division);
        }
        if ($request->district) {
            $locations->where('district', $request->district);
        }
        if ($request->tehsil) {
            $locations->where('tehsil', $request->tehsil);
        }
        if ($request->mineral) {
            $locations->where('mineral', $request->mineral);
        }

        $locations = $locations->get();

        return view('admin.location.search', compact('locations'));
    }

    public function searchFilterFromPage(Request $request)
    {
        $locations = Location::where('status', 1);
        $id = Auth::id();
        if(!$id) $id = 0;

        if ($request->division) {
            $locations->where('division', $request->division);
        }
        if ($request->district) {
            $locations->where('district', $request->district);
        }
        if ($request->tehsil) {
            $locations->where('tehsil', $request->tehsil);
        }
        if ($request->mineral) {
            $locations->where('mineral', $request->mineral);
        }

        $locations = $locations->get();

        return view('map', compact('locations','id'));
    }
}
