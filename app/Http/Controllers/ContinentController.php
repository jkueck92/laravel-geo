<?php

namespace App\Http\Controllers;

use App\Continent;
use App\Country;
use App\Rules\RuleContinentCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContinentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mContinent');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continents = Continent::where('user_id', '=', Auth::user()->id)->orderBy('name')->paginate(8);
        return view('continents.index')->with('continents', $continents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('continents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => [
                    'required',
                    'string'
                ],
                'code' => [
                    'required',
                    'string',
                    'max:2',
                    'min:2',
                    new RuleContinentCode
                ],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $continent = Continent::create(
                [
                    'name' => $request->get('name'),
                    'code' => strtoupper($request->get('code')),
                    'user_id' => Auth::user()->id
                ]
            );
            return redirect('continents')
                ->with('success', 'Continent (' . $continent->name . ') created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('continents.show')
            ->with('continent', Continent::find($id))
            ->with('countries', Country::where('continent_id', '=', $id)->paginate(8));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('continents.edit')->with('continent', Continent::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => [
                    'required',
                    'string'
                ]
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }
        $continent = Continent::find($id);
        $continent->name = $request->get('name');
        $continent->code = $request->get('code');
        $continent->save();
        return redirect('continents')->with('success', 'Continent (' . $continent->name . ') updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $continent = Continent::with('countries')->find($id);
        $countries = Country::with('airports')->where('continent_id', '=', $continent->id)->get();
        foreach ($countries as $country) {
            foreach ($country->airports as $airport) {
                $airport->delete();
            }
        }
        foreach ($continent->countries as $country) {
            $country->delete();
        }
        $continent->delete();
        return redirect('continents')->with('success', 'Continent (' . $continent->name . ') deleted successfully.');
    }

    public function trashed()
    {
        return view('continents.trashed')->with('continents', Continent::onlyTrashed()->paginate(8));
    }

    public function forceDelete($id)
    {
        $continent = Continent::with('countries')->withTrashed()->find($id);
        $countries = Country::with('airports')->onlyTrashed()->where('continent_id', '=', $continent->id)->get();

        foreach ($countries as $country) {
            foreach ($country->airports as $airport) {
                $airport->forceDelete();
            }
        }
        foreach ($continent->countries as $country) {
            $country->forceDelete();
        }
        $continent->forceDelete();
        return redirect('continents/trashed')->with('success', 'Continent (' . $continent->name . ') force deleted successfully.');
    }

}
