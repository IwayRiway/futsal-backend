<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Hour Book';
        $subjudul = false;
        $data = Hour::all();

        return view('hour/index', compact('judul', 'subjudul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Hour Book';
        $subjudul = 'Create';

        return view('hour/create', compact('judul', 'subjudul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'max:100', 'unique:hours'],
        ]);
        
        $data = [
            'name' => $request->name
        ];
        Hour::create($data);
        return redirect()->route('hour.index')->with('sukses', 'Data Jam Berhasil Ditambahkan');
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
        $judul = 'Hour Book';
        $subjudul = 'Edit';
        $data = Hour::findOrFail($id);

        return view('hour/edit', compact('judul', 'subjudul', 'data'));
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
        $validate = $request->validate([
            'name' => ['required', 'max:100', "unique:hours,name,$id,id"],
        ]);
        
        $data = [
            'name' => $request->name,
        ];
        Hour::findOrFail($id)->update($data);;
        return redirect()->route('hour.index')->with('info', 'Data Jam Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hour::findOrFail($id)->delete();
        return redirect()->route('hour.index')->with('warning', 'Data Jam Berhasil Dihapus');
    }
}
