<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trucking;
use App\Models\Vendor;
use App\Models\st_provinsi;
use App\Models\st_kabkota;
use App\Models\st_kecamatan;
use App\Models\st_kelurahan;
use Auth;

class TruckingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:operator_trucking');
    }

    public function index()
    {
        $username = Auth::user()->name;
        $total_konsumen = Trucking::count();
        $total_vendor = Vendor::count();
        $total_konsumen_diterima = Trucking::where('status', 2)->count('id_trucking');
        $total_konsumen_ditolak = Trucking::where('status', 3)->count('id_trucking');
        $trucking = Trucking::all();

        return view ('trucking.index', compact('username', 'total_konsumen', 'total_vendor', 'total_konsumen_ditolak', 'total_konsumen_diterima'))
                ->with('trucking', json_decode($trucking, true));
    }

    public function create()
    {
        $username = Auth::user()->name;
        return view ('trucking.create', compact('username'));
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
            $trucking->status = '0';
            $trucking->save();
            
            return redirect()->route('operator_trucking.index')->with('success', 'Data Konsumen berhasil ditambah!');
        } catch (Exception $e) {
            return redirect()->route('home');
        }

    }

    public function showKonsumen($id)
    {
        $username = Auth::user()->name;
        $trucking = Trucking::findOrFail($id);
        $vendor = Vendor::where('id_trucking', $id)->first();
        $provinsi = ''; $kabkota = ''; $kecamatan = '';
        if (isset($vendor)) {
            $provinsi = st_provinsi::where('id', $vendor->id_provinsi)->first();
            $kabkota = st_kabkota::where('id', $vendor->id_kabkota)->first();
            $kecamatan = st_kecamatan::where('id', $vendor->id_kecamatan)->first();
        }

        return view ('trucking.show-konsumen', compact('username', 'provinsi', 'kabkota', 'kecamatan', 'vendor'))
                ->with('trucking', json_decode($trucking, true));
    }

    
}
