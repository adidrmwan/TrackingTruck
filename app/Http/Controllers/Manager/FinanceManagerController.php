<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trucking;
use App\Models\Vendor;
use App\Models\st_provinsi;
use App\Models\st_kabkota;
use App\Models\st_kecamatan;
use App\Models\st_kelurahan;
use Auth;

class FinanceManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:finance_manager');
    }

    public function index()
    {
        $username = Auth::user()->name;
        $total_konsumen = Trucking::count();
        $total_vendor = Vendor::count();
        $total_konsumen_diterima = Trucking::where('status', 2)->count('id_trucking');
        $total_konsumen_ditolak = Trucking::where('status', 3)->count('id_trucking');
        $trucking = Trucking::all();

        return view ('finance.index', compact('username', 'total_konsumen', 'total_vendor', 'total_konsumen_ditolak', 'total_konsumen_diterima'))
                ->with('trucking', json_decode($trucking, true));
    }

    public function create()
    {
        $username = Auth::user()->name;
        return view ('finance.create', compact('username'));
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
            
            return redirect()->route('finance_manager.show', ['id' => $trucking->id_trucking])
                             ->with('success', 'Data Konsumen berhasil ditambah!');
        } catch (Exception $e) {
            return redirect()->route('home');
        }

    }

    public function show($id)
    {
        $username = Auth::user()->name;
        $trucking = Trucking::findOrFail($id);
        return view ('finance.show', compact('username'))
                ->with('trucking', json_decode($trucking, true));
    }

    public function edit($id)
    {
        $username = Auth::user()->name;
        $trucking = Trucking::find($id);

        $date = \Carbon\Carbon::parse($trucking->tanggal);

        $day = $date->day;
        $month = $date->month;
        $year = $date->year;
        return view ('finance.edit', compact('username', 'day', 'month', 'year'))
        		->with('trucking', json_decode($trucking, true));
    }

    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $trucking = Trucking::find($id);
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
            $trucking->status = '1';
            $trucking->update();
            
            return redirect()->route('finance_manager.index');
        } catch (Exception $e) {
            return redirect()->route('home');
        }

    }

    public function accept($id)
    {
        try {
            $username = Auth::user()->name;
            $trucking = Trucking::find($id);
            $trucking->status = '2';
            $trucking->update();

            return redirect()->back();
            
        } catch (Exception $e) {
            return redirect()->route('home');
        }
    }

    public function decline($id)
    {
        try {
            $username = Auth::user()->name;
            $trucking = Trucking::find($id);
            $trucking->status = '3';
            $trucking->update();

            return redirect()->back();
            
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

        return view ('finance.show-konsumen', compact('username', 'provinsi', 'kabkota', 'kecamatan', 'vendor'))
                ->with('trucking', json_decode($trucking, true));
    }

    public function createVendor($id)
    {
        $username = Auth::user()->name;
        $provinsi = st_provinsi::all();

        return view ('finance.create-vendor', compact('username', 'id'))
                ->with('provinsi', json_decode($provinsi, true));
    }

    public function storeVendor($id, Request $request)
    {
        $username = Auth::user()->name;
        $vendor = new Vendor;
        $vendor->id_trucking = $id;
        $vendor->vendor_name = $request->input('vendor_name');
        $vendor->vendor_address = $request->input('vendor_address');
        $vendor->id_provinsi = $request->input('id_provinsi');
        $vendor->id_kabkota = $request->input('id_kabkota');
        $vendor->id_kecamatan = $request->input('id_kecamatan');
        $vendor->id_kelurahan = $request->input('id_kelurahan');
        $vendor->kode_pos = $request->input('kode_pos');
        $vendor->entry_user = Auth::user()->id;
        $vendor->save();

        return redirect()->route('finance_manager.index')
                             ->with('success', 'Data Vendor berhasil ditambah!');
    }
}
