<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Continent;
use App\Country;
use App\Rules\RuleCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mCountry');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::where('user_id', '=', Auth::user()->id)->orderBy('name')->paginate(8);
        return view('countries.index')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create')
            ->with('continents', Continent::orderBy('name')->get());
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
                'name' => ['required', 'string'],
                'alpha2' => ['required', 'string', 'max:2', 'min:2', new RuleCountry],
                'alpha3' => ['required', 'string', 'max:3', 'min:3', new RuleCountry],
                'alphaNumeric' => ['required', 'string', 'max:3', 'min:3', new RuleCountry],
                'continent' => ['required', 'integer'],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $country = Country::create([
                'name' => $request->get('name'),
                'alpha2' => strtoupper($request->get('alpha2')),
                'alpha3' => strtoupper($request->get('alpha3')),
                'alphaNumeric' => $request->get('alphaNumeric'),
                'continent_id' => $request->get('continent'),
                'user_id' => Auth::user()->id,
            ]);
            return redirect('countries')
                ->with('success', 'Country (' . $country->name . ') created successfully.');
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
        return view('countries.show')
            ->with('country', Country::with('continent')->find($id))
            ->with('airports', Airport::where('country_id', '=', $id)->paginate(8));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('countries.edit')
            ->with('country', Country::with('continent')->find($id))
            ->with('continents', Continent::orderBy('name')->get());
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
                'name' => ['required', 'string'],
                'continent' => ['required', 'integer'],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $country = Country::find($id);
            $country->name = $request->get('name');
            $country->continent_id = $request->get('continent');
            $country->save();
            return redirect('countries')->with('success', 'Country (' . $country->name . ') updated successfully.');
        }
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
        $country = Country::with('airports')->find($id);
        foreach ($country->airports as $airport) {
            $airport->delete();
        }
        $country->delete();
        return redirect('countries')->with('success', 'Country (' . $country->name . ') deleted successfully.');
    }

    public function trashed()
    {
        return view('countries.trashed')->with('countries', Country::onlyTrashed()->paginate(8));
    }

    public function forceDelete($id)
    {
        $country = Country::with('airports')->withTrashed()->find($id);
        foreach ($country->airports as $airport) {
            $airport->forceDelete();
        }
        $country->forceDelete();
        return redirect('countries/trashed')->with('success', 'Country (' . $country->name . ') force deleted successfully.');
    }

}
