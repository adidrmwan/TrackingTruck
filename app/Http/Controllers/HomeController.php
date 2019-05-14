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
	    			case 'superadmin':
	    				return redirect()->route('superadmin.dashboard');
	    			
	    			case 'admin':
	    				return redirect()->route('admin.dashboard');
	    			
	    			case 'finance_manager':
	    				return redirect()->route('finance_manager.dashboard');
	    				break;
	    			
	    			case 'general_manager':
	    				return redirect()->route('general_manager.dashboard');
	    				break;
	    			
	    			case 'operator_trucking':
	    				return redirect()->route('operator_trucking.dashboard');
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
