<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if($user){
            if (Hash::check($password, $user->password)){
                $data['code'] = 200;
                $data['status'] = 'Berhasil';
                $data['result'] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'photo' => $user->photo,
                ];
            } else {
                $data['code'] = 400;
                $data['status'] = 'Password Salah';
            }
        } else {
            $data['code'] = 404;
            $data['status'] = 'Username Tidak Ditemukan';
        }

        return $data;
    }

    public function register(Request $request)
    {
        $insert = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $file = $request->file('file');
        if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image/avatar';
            $file->move($tujuan_upload,$nama_file);

            $insert['photo'] = $tujuan_upload .'/'. $nama_file;
        }

        $user = User::create($insert);
        if($user){
            $data['code'] = 200;
            $data['status'] = 'Berhasil Disimpan';
        } else {
            if($file){
                File::delete($insert['photo']);
            }

            $data['code'] = 400;
            $data['status'] = 'Gagal Disimpan';
        }

        return $data;
    }

    public function update(Request $request)
    {
        $update = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $file = $request->file('file');
        if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image/avatar';
            $file->move($tujuan_upload,$nama_file);

            $update['photo'] = $tujuan_upload .'/'. $nama_file;
        }

        $password = $request->password;
        if($password){
            $update['password'] = Hash::make($password);
        }

        $user = User::findOrFail($request->id)->update($update);
        if($user){
            $data['code'] = 200;
            $data['status'] = 'Berhasil diupdate';
        } else {
            $data['code'] = 400;
            $data['status'] = 'Gagal diupdate';
        }

        return $data;
    }
}
