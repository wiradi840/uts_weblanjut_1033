<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        return view('beranda');
    }

    public function formKegiatan(){
        return view('formKegiatan');
    }

    // Memasukan data kegiatan
    public function inputKegiatan(Request $req){
        $nama = $req->nama;
        $tanggal = $req->tanggal;
        $kuota = $req->kuota;
        $sisa = 0;

        DB::table('kegiatan')->insert(['nama' => $nama, 'tanggal' => $tanggal, 'kuota' => $kuota, 'sisa' => $sisa]);
        session()->flash('success', 'Data Kegiatan Berhasil Ditambahkan!');
        return redirect('kegiatan');
    }
    
    public function show(){
        $kegiatan = DB::table('kegiatan')->get();

        return view('kegiatan', ['kegiatan'=>$kegiatan]);
    }

    public function status($id){
        $kegiatan = DB::table('kegiatan')->where('id', '=', $id)->get();
        $kegiatan = $kegiatan->toArray();
        $tutup = "tutup";
        $buka = "buka";
        if($kegiatan[0]->status == "buka"){
            DB::table('kegiatan')->where('id', '=', $id)->update(['status' => $tutup]);
            return redirect('kegiatan');
        } else {
            DB::table('kegiatan')->where('id', '=', $id)->update(['status' => $buka]);
            return redirect('kegiatan');
        }
    }

    public function detail($id){

        $anggota = DB::table('anggota')->where('kegiatan_id', $id)->get();
        $kegiatan = DB::table('kegiatan')->where('id', $id)->get();
        return view('/detail', ['var_anggota' => $anggota,'var_kegiatan' => $kegiatan]);    
    }

    public function delete($id){

        // menghapus data kegiatan berdasarkan id yang dipilih
        DB::table('kegiatan')->where('id',$id)->delete();
        DB::table('anggota')->where('kegiatan_id', $id)->delete();
        session()->flash('success', 'Data Kegiatan Berhasil Dihapus!');
        // alihkan halaman ke halaman rekap
	    return redirect('/kegiatan');
    }

}