<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\AnakBimbingan;
use App\Dosen;
use DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=array();
        $mahasiswa=Mahasiswa::all();
        foreach($mahasiswa as $item){
            $nim=$item->nim;
            $pembimbing=DB::table('anak_bimbingan') 
            ->join('dosen', 'anak_bimbingan.nid', '=', 'dosen.nid')
            ->where('anak_bimbingan.nim',$nim)->orderBy('anak_bimbingan.status', 'ASC')->get();
            array_push($data,
            array(
                "nim"=>$nim,
                "nama"=>$item->nama,
                "password"=>$item->password,
                "pembimbing"=>$pembimbing,
            ));
        }
        return view('mahasiswa/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Dosen::all();
        return view('mahasiswa/create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nim=$request['nim'];
        $nama=$request['nama'];
        $password=$request['password'];
        $p1=$request['pembimbing1'];
        $p2=$request['pembimbing2'];
        $jumlah=0;
        foreach( $nim as $key => $n ) {
            $cek=Mahasiswa::where('nim',$n)->value('nim');
            if($cek==''){
                $jumlah=$jumlah+1;
                // if($p1[$key]=='' || $p2[$key]==''){
                    $data = Mahasiswa::create([
                        'nim'  => $n,
                        'nama' => $nama[$key],
                        'password' => $password[$key],
                    ]);

                    $data2 = AnakBimbingan::create([
                        'id_ab'  => null,
                        'nim' => $n,
                        'nid' => $p1[$key],
                        'status' => 1,
                    ]);

                    $data3 = AnakBimbingan::create([
                        'id_ab'  => null,
                        'nim' => $n,
                        'nid' => $p2[$key],
                        'status' => 2,
                    ]);
                // }else{
                //     session()->flash('success-create', 'Sebagian data tidak valid');
                //     return redirect()->back();
                // }
            }
        }
        if($jumlah==0){
            session()->flash('success-create', 'Terdapat nim yang sama silakan input kembali');
            return redirect()->back();
        }else{
            session()->flash('success-create', 'Data berhasil dibuat sebanyak '.$jumlah);
            return redirect()->route('mahasiswa.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=array();
        $mahasiswa=Mahasiswa::where('nim',$id)->get();
        foreach($mahasiswa as $item){
            $nim=$item->nim;
            $pembimbing=DB::table('anak_bimbingan') 
            ->join('dosen', 'anak_bimbingan.nid', '=', 'dosen.nid')
            ->where('anak_bimbingan.nim',$nim)->orderBy('anak_bimbingan.status', 'ASC')->get();
            array_push($data,
            array(
                "nim"=>$nim,
                "nama"=>$item->nama,
                "password"=>$item->password,
                "pembimbing"=>$pembimbing,
            ));
        }
        $datas=Dosen::all();
        return view('mahasiswa/edit', compact('data','datas'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $pem1=$request['pembimbing1'];
        $pem2=$request['pembimbing2'];
        $nim=$request['nim'];
        $nama=$request['nama'];
        $password=$request['password'];
        $ab = AnakBimbingan::where('nim',$nim);
        $ab->delete();
        $data2 = AnakBimbingan::create([
            'id_ab'  => null,
            'nim' => $nim,
            'nid' => $pem1,
            'status' => 1,
        ]);

        $data3 = AnakBimbingan::create([
            'id_ab'  => null,
            'nim' => $nim,
            'nid' => $pem2,
            'status' => 2,
        ]);

        $data = Mahasiswa::where('nim',$id);
        $data->update([
            'nim'  =>$nim,
            'nama' => $nama,
            'password'  => $password,
        ]);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::where('nim',$id);
        $mahasiswa->delete();
        $ab = AnakBimbingan::where('nim',$id);
        $ab->delete();

        return redirect()->route('mahasiswa.index');
    }
}
