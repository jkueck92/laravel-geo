<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Continent;
use App\Country;
use App\UserLoginActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')
            ->with('countContinents', Continent::count())
            ->with('countCountries', Country::count())
            ->with('countAirports', Airport::count());
    }

    public function edit()
    {
        return view('profile')
            ->with('user', Auth::user())
            ->with('logins', UserLoginActivity::orderBy('created_at', 'DESC')->paginate(8));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'firstname' => ['required', 'string'],
                'lastname' => ['required', 'string'],
                'email' => ['required', 'string'],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $user = Auth::user();
            $user->firstname = $request->get('firstname');
            $user->lastname = $request->get('lastname');
            $user->email = $request->get('email');
            $user->save();
            return redirect('profile')->with('success', 'Your profile updated successfully.');
        }
    }

}
