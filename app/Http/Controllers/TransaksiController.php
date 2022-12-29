<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Paket;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function TransaksiView()
    {
        $data = Transaksi::all();
        return view('transaksi.index', compact('data'));
    }

    public function TransaksiEdit($id)
    {
        $data = Transaksi::find($id);
        $coachs = Coach::all();
        $pakets = Paket::all();
        return view('transaksi.edit', compact('data', 'coachs', 'pakets'));
    }

    public function TransaksiUpdate(Request $request, $id)
    {
        $data = Transaksi::find($id);
        $data->status = $request->status;
        $data->coach_id = $request->coach_id;
        $data->paket_id = $request->paket_id;
        $data->jadwal_mulai = $request->jadwal_mulai;
        $data->jadwal_selesai = $request->jadwal_selesai;
        $data->save();

        return redirect('/transaksi');
    }

    public function TransaksiDelete($id)
    {
        $deleteData= Transaksi::find($id);
        $deleteData->delete();

        return redirect('/transaksi');
    }

    public function Invoice($id)
    {
        $data = Transaksi::find($id);
        return view('transaksi.invoice', compact('data'));
    }
}
