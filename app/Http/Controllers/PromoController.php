<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Promo';
        $subjudul = false;
        $data = Promo::all();

        return view('promo/index', compact('judul', 'subjudul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Promo';
        $subjudul = 'Create';

        return view('promo/create', compact('judul', 'subjudul'));
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
            'nama' => ['required', 'max:100'],
            'description' => ['required'],
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
        
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'image/promo';
        $file->move($tujuan_upload,$nama_file);
        
        $data = [
            'nama' => $request->nama,
            'description' => $request->description,
            'active' => $request->active??0,
            'photo' => $tujuan_upload .'/'. $nama_file
        ];
        Promo::create($data);
        return redirect()->route('promo.index')->with('sukses', 'Data Promo Berhasil Ditambahkan');
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
        $judul = 'Promo';
        $subjudul = 'Edit';
        $data = Promo::findOrFail($id);

        return view('promo/edit', compact('judul', 'subjudul', 'data'));
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
            'nama' => ['required', 'max:100'],
            'description' => ['required'],
        ]);
        
        $data = [
            'nama' => $request->nama,
            'description' => $request->description,
            'active' => $request->active??0,
        ];
        $promo = Promo::findOrFail($id);
        
        $file = $request->file('file');
        if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image/promo';
            $file->move($tujuan_upload,$nama_file);

            $data['photo'] = $tujuan_upload .'/'. $nama_file;
            File::delete($promo->photo);
        }
        
        $promo->update($data);
        return redirect()->route('promo.index')->with('info', 'Data Promo Berhasil Diubah');
    }

    public function updateActive(Request $request)
    {
        $data = [
            'active' => $request->active
        ];

        Promo::where('id',$request->id)->update($data);
        return json_encode('200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        File::delete($promo->photo);
        $promo->delete();
        return redirect()->route('promo.index')->with('warning', 'Data Promo Berhasil Dihapus');
    }
}
