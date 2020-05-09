<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    // Menampilkan data kegiatan yang tersedia di form anggota
    public function daftarKegiatan(){
        $kegiatan = DB::table('kegiatan')->get();
        return view('formAnggota', ['var_kegiatan' => $kegiatan]);
    }

    // Membuat fungsi utk memasukan data dari form anggota ke database
    public function prosesDaftar(Request $req){
        $nim = $req->nim;   
        $nama = $req->nama;
        $prodi = $req->prodi;
        $pilihKegiatan = $req->kegiatan;

        $kegiatan = DB::table('kegiatan')->where('id', '=', $pilihKegiatan)->get();
        $kegiatan = $kegiatan->toArray();
        if($kegiatan[0]->sisa >= $kegiatan[0]->kuota){
            session()->flash('failed', 'Pendaftaran Sudah Penuh!');
            return redirect('daftar');
        } else{
            DB::table('anggota')->insert(['nim'=>$nim, 'nama'=>$nama, 'prodi'=>$prodi, 'kegiatan_id'=>$pilihKegiatan]);
            $row = DB::table('anggota')->where('kegiatan_id', '=', $kegiatan[0]->id)->get();
            $count = count($row);
            DB::table('kegiatan')->where('id', '=', $pilihKegiatan)->update(['sisa'=>$count]);
            session()->flash('success', 'Pendaftaran Berhasil!');

            return redirect('daftar');
        }
    }
}
