<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Food & Beverages';
        $subjudul = false;
        $data = Food::all();

        return view('food/index', compact('judul', 'subjudul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Food & Beverages';
        $subjudul = 'Create';

        return view('food/create', compact('judul', 'subjudul'));
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
            'type' => ['required'],
            'file' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
        
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'image/foods';
        $file->move($tujuan_upload,$nama_file);
        
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
            'photo' => $tujuan_upload .'/'. $nama_file
        ];
        // dd($data);
        Food::create($data);
        return redirect()->route('food.index')->with('sukses', 'Data Makanan Berhasil Ditambahkan');
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
        $judul = 'Food';
        $subjudul = 'Edit';
        $data = Food::findOrFail($id);

        return view('food/edit', compact('judul', 'subjudul', 'data'));
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
            'type' => ['required'],
        ]);
        
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
        ];
        $food = Food::findOrFail($id);
        
        $file = $request->file('file');
        if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image/food';
            $file->move($tujuan_upload,$nama_file);

            $data['photo'] = $tujuan_upload .'/'. $nama_file;
            File::delete($food->photo);
        }
        
        $food->update($data);
        return redirect()->route('food.index')->with('info', 'Data Makanan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        File::delete($food->photo);
        $food->delete();
        return redirect()->route('food.index')->with('warning', 'Data Makanan Berhasil Dihapus');
    }
}
