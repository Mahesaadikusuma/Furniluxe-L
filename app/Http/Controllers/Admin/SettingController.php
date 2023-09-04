<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index(Request $request, $id)
    {
        $user = Auth::user();
        $name = Str::slug($user->name);

        // $item = Setting::with('user')->FindOrFail($id);
        $item = User::with(['setting'])->where('name', $name)->first();

        // dd($item);

        
        return view('pages.Admin.setting.index', compact('item'));
    }


    public function updateOrcreate(SettingRequest $request)
    {
        // // $items = $request->all();
        // Setting::updateOrcreate(
        // [
        //     // 'id' => $request->id,
        //     'user_id'   => Auth::user()->id,
        // ],
        // [
        //     'full_name' => $request->get('full_name'),
        //     'kota' => $request->get('kota'),
        //     'province' => $request->get('province'),
        //     'no_hp' => $request->get('no_hp'),
        //     'alamat' => $request->get('alamat'),
        //     'user_id'   => $request->get('user_id'),
        // ]);
        

        // return redirect()
        //     ->route('setting');


        // Menggunakan informasi pengguna saat ini untuk menghindari masalah keamanan
        $user_id = Auth::id();
        
        // Menentukan kondisi pencarian untuk update atau create
        $conditions = [
            'user_id' => $user_id,
        ];
        
        // Data yang akan diupdate atau di-create
        $data = [
            'full_name' => $request->input('full_name'),
            'kota' => $request->input('kota'),
            'province' => $request->input('province'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'user_id' => $user_id,
        ];
        
        // Melakukan update atau create
        $setting = Setting::updateOrCreate($conditions, $data);
         // Mengelola unggah avatar jika ada file yang diunggah
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($setting->avatar) {
                
                Storage::disk('local')->delete('public/' . $setting->avatar); 
            }

            // Simpan avatar baru
            $avatarPath = $request->file('avatar')->store('assets/avatars', 'public');
            $setting->avatar = $avatarPath;
            $setting->save();
        }
        
        return redirect()->route('setting', Auth::user()->name);
    }
}
