<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trucking;
use Auth;

class GeneralManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:general_manager');
    }

    public function index()
    {
        $username = Auth::user()->name;
        $trucking = Trucking::all();
        return view ('gm.index', compact('username'))
                ->with('trucking', json_decode($trucking, true));
    }
}
