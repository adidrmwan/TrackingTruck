<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperadminController extends Controller
{
    public function dashboard() {
        return view('superadmin.index');
    }
    public function create() {
        return view('superadmin.create');
    }
    public function admin() {
        return view('admin.index');
    }
    public function admin_create() {
        return view('admin.create');
    }
}
