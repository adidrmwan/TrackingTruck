<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	try {
	    	$user = Auth::user();

	    	foreach ($user->roles as $role) {
	    		switch ($role->name) {
	    			case 'admin':
	    				return redirect()->route('admin.dashboard');
	    				break;
	    			
	    			default:
	    				# code...
	    				break;
	    		}
	    	}
    		
    	} catch (Exception $e) {
	        return redirect()->route('welcome');
    	}

    }
}
