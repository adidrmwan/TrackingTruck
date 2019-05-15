<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trucking;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $username = Auth::user()->name;
        $trucking = Trucking::all();
        return view ('admin.index', compact('username'))
                ->with('trucking', json_decode($trucking, true));
    }

    public function create()
    {
        $username = Auth::user()->name;
        return view ('admin.create', compact('username'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        try {
            $trucking = new Trucking;
            $trucking->tanggal = $request->input('tanggal');
            $trucking->no_jo = $request->input('no_jo');
            $trucking->no_kendaraan = $request->input('no_kendaraan');
            $trucking->sopir = $request->input('sopir');
            $trucking->customer = $request->input('customer');
            $trucking->tujuan_dari = $request->input('tujuan_dari');
            $trucking->tujuan_ke = $request->input('tujuan_ke');
            $trucking->jumlah_bop = $request->input('jumlah_bop');
            $trucking->tagihan = $request->input('tagihan');
            $trucking->ket = 'BOP ARS';
            $trucking->entry_user = $user->id;
            
            //perhitungan revenue
            $revenue = $request->tagihan / 1.1;
            $trucking->revenue = $revenue;

            //perhitungan profit
            $provit = $revenue - $request->jumlah_bop;
            $trucking->provit = $provit;
            $trucking->status = 0;
            $trucking->save();
            
            return redirect()->route('admin.index');
        } catch (Exception $e) {
            return redirect()->route('home');
        }

    }
}
