<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Paket;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function JadwalCreate()
    {
        $coach = Coach::all();
        $paket = Paket::all();
        return view('jadwal.create', compact('coach', 'paket'));
    }

    public function JadwalStore(Request $request)
    {
        $validatedData = $request->validate([
            'coach_id' =>'required',
            'paket_id' =>'required',
            'pembayaran' =>'required',
        ]);

        $data=new Transaksi();
        $data->member_id = Auth::user()->id;
        $data->coach_id = $request->coach_id;
        $data->paket_id = $request->paket_id;

        $paket = Paket::find($request->paket_id);
        $data->jadwal_mulai = Carbon::now();
        $data->jadwal_selesai = Carbon::now()->addDays($paket->durasi);
        $data->status = 0;
        $data->pembayaran = $request->pembayaran;

        if ($request->pembayaran == 1) {
            if ($image = $request->file('bukti')) {
                $destinationPath = 'bukti_transfer/';
                $profileImage = $request->member_id . "-" .date('Ymd') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $image_path = $destinationPath."$profileImage";
                $data->bukti = $image_path;
            }
        }

        $data->save();

        return redirect('transaksi/invoice/'.$data->id);
    }

    public function JadwalView()
    {
        $member = Auth::user();
        $hari_ini = Carbon::now();
        $data = Transaksi::where('member_id', $member->id )->where('jadwal_selesai', '>=', $hari_ini)->first();

        return view('jadwal.view', compact('data'));
    }

    public function JadwalRiwayat()
    {
        $member = Auth::user();
        $data = Transaksi::where('member_id', $member->id )->get();
        return view('jadwal.riwayat', compact('data'));
    }

}
