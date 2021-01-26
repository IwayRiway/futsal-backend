<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use Illuminate\Support\Facades\File;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Lapangan';
        $subjudul = false;
        $data = Field::all();

        return view('field/index', compact('judul', 'subjudul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Field';
        $subjudul = 'Create';

        return view('field/create', compact('judul', 'subjudul'));
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
            'price' => ['required'],
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
        
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'image/field';
        $file->move($tujuan_upload,$nama_file);
        
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $tujuan_upload .'/'. $nama_file
        ];
        Field::create($data);
        return redirect()->route('field.index')->with('sukses', 'Data Lapangan Berhasil Ditambahkan');
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
        $judul = 'Field';
        $subjudul = 'Edit';
        $data = Field::findOrFail($id);

        return view('field/edit', compact('judul', 'subjudul', 'data'));
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
            'price' => ['required'],
        ]);
        
        $data = [
            'name' => $request->name,
            'price' => $request->price,
        ];
        $field = Field::findOrFail($id);
        
        $file = $request->file('file');
        if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image/field';
            $file->move($tujuan_upload,$nama_file);

            $data['photo'] = $tujuan_upload .'/'. $nama_file;
            File::delete($field->photo);
        }
        
        $field->update($data);
        return redirect()->route('field.index')->with('info', 'Data Lapangan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = Field::findOrFail($id);
        File::delete($field->photo);
        $field->delete();
        return redirect()->route('field.index')->with('warning', 'Data Field Berhasil Dihapus');
    }
}
