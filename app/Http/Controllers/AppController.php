<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Auth;
use File;
use Illuminate\Support\Collection;
use Session;

class AppController extends Controller
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
        return view('dashboard');
    }

    public function getPreferences()
    {
        //grab the current user
        $user = Auth::user();

        //search for bootswatch themes
        $bootswatch_themes = File::directories('assets/vendor/bootswatch');

        //grab the theme names and sort
        $themes = collect($bootswatch_themes)
            ->map(function($path){
                return basename($path);
            })->sort();

        //render prefernces page with the current user, themes and any messages
        return view('preferences')
            ->with([
                'user' => $user,
                'themes' => $themes,
                'message' => Session::get('message')
            ]);
    }

    public function updatePreferences(Request $request)
    {
        //update the user preferences (theme changed?)
        $user = Auth::user();
        $user->preferences->theme = $request->theme;
        $user->preferences->save();
        $user->save();

        //return with confirmation message
        return redirect('preferences')->with([
            'message' => 'Preferences updated!'
        ]);
    }
}
