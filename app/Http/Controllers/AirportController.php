<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Country;
use App\Rules\RuleAirport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AirportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mAirport');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::where('user_id', '=', Auth::user()->id)->orderBy('name')->paginate(8);
        return view('airports.index')->with('airports', $airports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airports.create')
            ->with('countries', Country::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'string'],
                'iata' => ['required', 'string', 'max:3', 'min:3', new RuleAirport],
                'icao' => ['required', 'string', 'max:4', 'min:4', new RuleAirport],
                'country' => ['required', 'integer'],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $airport = Airport::create([
                'name' => $request->get('name'),
                'iata' => strtoupper($request->get('iata')),
                'icao' => strtoupper($request->get('icao')),
                'country_id' => $request->get('country'),
                'user_id' => Auth::user()->id,
            ]);
            return redirect('airports')
                ->with('success', 'Airport (' . $airport->name . ') created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('airports.show')
            ->with('airport', Airport::with('country')->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('airports.edit')
            ->with('airport', Airport::with('country')->find($id))
            ->with('countries', Country::orderBy('name')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'string'],
                'country' => ['required', 'integer'],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $airport = Airport::find($id);
            $airport->name = $request->get('name');
            $airport->country_id = $request->get('country');
            $airport->save();
            return redirect('airports')->with('success', 'Airport (' . $airport->name . ') updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $airport = Airport::find($id);
        $airport->delete();
        return redirect('airports')->with('success', 'Airport (' . $airport->name . ') deleted successfully.');
    }

    public function trashed()
    {
        return view('airports.trashed')->with('airports', Airport::onlyTrashed()->paginate(8));
    }

    public function forceDelete($id)
    {
        $airport = Airport::withTrashed()->find($id);
        $airport->forceDelete();
        return redirect('airports/trashed')->with('success', 'Airport (' . $airport->name . ') force deleted successfully.');
    }

}
