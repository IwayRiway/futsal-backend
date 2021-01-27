<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Help;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Frequent Answer Question';
        $subjudul = false;
        $data = Help::all();

        return view('help/index', compact('judul', 'subjudul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Frequent Answer Question';
        $subjudul = 'Create';

        return view('help/create', compact('judul', 'subjudul'));
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
            'name' => ['required', 'max:100'],
            'description' => ['required'],
        ]);
        
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        Help::create($data);
        return redirect()->route('help.index')->with('sukses', 'Data FAQ Berhasil Ditambahkan');
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
        $judul = 'Frequent Answer Question';
        $subjudul = 'Edit';
        $data = Help::findOrFail($id);

        return view('help/edit', compact('judul', 'subjudul', 'data'));
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
            'name' => ['required', 'max:100'],
            'description' => ['required'],
        ]);
        
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        Help::findOrFail($id)->update($data);

        return redirect()->route('help.index')->with('info', 'Data FAQ Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Help::findOrFail($id)->delete();
        return redirect()->route('help.index')->with('warning', 'Data FAQ Berhasil Dihapus');
    }
}
