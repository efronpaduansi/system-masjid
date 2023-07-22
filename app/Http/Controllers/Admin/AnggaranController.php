<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\Pembangunan;
use App\Models\User;
use App\Models\KasMasjid;
use Alert;
class AnggaranController extends Controller
{
    public function index(Anggaran $anggaran){
        $anggaran = $anggaran::orderBy('id', 'desc')->get();
        return view('admin.anggaran.manage', compact('anggaran'));
    }

    public function create(User $user){
        $users = $user::orderBy('name', 'asc')->get();
        $kas = KasMasjid::orderBy('id', 'desc')->get();
        return view('admin.anggaran.form_create', compact('users', 'kas'));
    }

    public function store(Request $request, Anggaran $anggaran){
        $data = [
            'kas_id' => $request->kas_id,
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'signed_by' => $request->signed_by
        ];

        if($anggaran->create($data)){
            Alert::success('Sukses', 'Simpan berhasil!');
            return to_route('anggaran.index');
        }else{
            Alert::error('Gagal', 'Simpan gagal! Silahkan coba lagi!');
            return redirect()->back()->withInput();
        }
    }

    public function detail($id){
        $anggaran = Anggaran::findOrFail($id);
        $pembangunan = Pembangunan::where('anggaran_id', $id)->get();
        return view('admin.anggaran.anggaran', compact('anggaran', 'pembangunan'));
    }    
    
    
    public function print($id){
        $anggaran = Anggaran::findOrFail($id);
        $pembangunan = Pembangunan::where('anggaran_id', $id)->get();
        return view('admin.anggaran.pdf', compact('anggaran', 'pembangunan'));
    }                                                                   
        
    public function edit($id, Anggaran $anggaran, User $user){
        $anggaran = $anggaran::findOrFail($id);
        $users = $user::orderBy('name', 'asc')->get();
        return view('admin.anggaran.form_edit', compact('anggaran', 'users'));
    }

    public function update(Request $request, $id, Anggaran $anggaran){
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'signed_by' => $request->signed_by
        ];
        
        if($anggaran->where('id', $id)->update($data)){
            Alert::success('Sukses', 'Update berhasil!');
            return to_route('anggaran.index');
        }else{
            Alert::error('Gagal', 'Update gagal! Silahkan coba lagi!');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id, Anggaran $anggaran){
        if($anggaran->where('id', $id)->delete()){
            Alert::success('Sukses', 'Hapus berhasil!');
            return to_route('anggaran.index');
        }else{
            Alert::error('Gagal', 'Hapus gagal! Silahkan coba lagi!');
            return to_route('anggaran.index');
        }
    }
}
