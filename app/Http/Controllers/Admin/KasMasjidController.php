<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KasMasjid;
use Alert;
class KasMasjidController extends Controller
{
    public function index(KasMasjid $kas){
        $kas = $kas::orderBy('id', 'desc')->get();
        return view('admin.kas.manage', compact('kas'));
    }

    public function store(Request $request, KasMasjid $kas){
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date
        ];
        if($kas->create($data)){
            Alert::success('Sukses', 'Simpan berhasil!');
            return to_route('kas.index');
        }else{
            Alert::error('Gagal', 'Simpan gagal! Silahkan coba lagi.');
            return to_route('kas.index');
            
        }
    }

    public function edit($id, KasMasjid $kas){
        $kas = $kas::findOrFail($id);
        return view('admin.kas.form_edit', compact('kas'));
    }

    public function update(Request $request, $id, KasMasjid $kas){
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date
        ];
        if($kas->where('id', $id)->update($data)){
            Alert::success('Sukses', 'Update berhasil!');
            return to_route('kas.index');
        }else{
            Alert::error('Gagal', 'Update gagal! Silahkan coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id, KasMasjid $kas){
        if($kas->where('id', $id)->delete()){
            Alert::success('Sukses', 'Hapus berhasil!');
            return to_route('kas.index');
        }else{
            Alert::error('Gagal', 'Hapus gagal! Silahkan coba lagi.');
            return to_route('kas.index');
        }
    }
}
