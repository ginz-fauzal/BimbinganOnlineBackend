<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Dosen::all();
        return view('dosen/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nid=$request['nid'];
        $nama=$request['nama'];
        $password=$request['password'];
        foreach( $nid as $key => $n ) {
            $data = Dosen::create([
                'nid'  => $n,
                'nama' => $nama[$key],
                'password' => $password[$key],
            ]);
        }
    
        session()->flash('success-create', 'Data berhasil dibuat');
        return redirect()->route('dosen.index');
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
        $dosen=Dosen::where('nid',$id)->get();
        return view('dosen/edit', compact('dosen'));
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
        $data = Dosen::where('nid',$id);
        $data->update([
            'nid'  => $request['nid'],
            'nama' => $request['nama'],
            'password'  => $request['password'],
        ]);
        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::where('nid',$id);
        $dosen->delete();

        return redirect()->route('dosen.index');
    }
}
