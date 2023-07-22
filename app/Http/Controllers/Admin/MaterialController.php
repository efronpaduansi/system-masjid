<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Pembangunan;
Use Alert;
class MaterialController extends Controller
{
    private function codeGenerator(){
        $code = 'BRG'.rand(1000,9999);
        $code_exist = Material::where('code',$code)->first();
        if($code_exist){
            return $this->codeGenerator();
        }
        return $code;
    }

    public function index(Material $material){
        $materials = $material::orderBy('id', 'desc')->get();
        return view('admin.material.manage', compact('materials'));
    }

    public function create(){
        $code = $this->codeGenerator();
        $master = Pembangunan::orderBy('id', 'desc')->get();
        return view('admin.material.form_create', compact('code', 'master'));
    }

    public function store(Request $request, Material $material){
        $data = [
            'pembangunan_id' => $request->pembangunan_id, 
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'unit' => $request->unit,
            'unit_price' => $request->unit_price,
            'amount' => $request->amount,
            'total' => $request->unit_price * $request->amount,
            'order_date' => $request->order_date
        ];

        if($material->create($data)){
            Alert::success('Sukses', 'Simpan berhasil!');
            return to_route('material.index');
        }else{
            Alert::error('Gagal', 'Simpan gagal! Silahkan coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id, Material $material){
        $material = $material->findOrFail($id);
        $master = Pembangunan::orderBy('id', 'desc')->get();
        return view('admin.material.form_edit', compact('material', 'master'));
    }

    public function update(Request $request, $id, Material $material){
        $data = [
            'pembangunan_id' => $request->pembangunan_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'unit' => $request->unit,
            'unit_price' => $request->unit_price,
            'amount' => $request->amount,
            'total' => $request->unit_price * $request->amount,
            'order_date' => $request->order_date
        ];

        if($material->where('id', $id)->update($data)){
            Alert::success('Sukses', 'Update berhasil!');
            return to_route('material.index');
        }else{
            Alert::error('Gagal', 'Update gagal! Silahkan coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id, Material $material){
        $delete = $material->where('id', $id)->delete();
        if($delete){
            Alert::success('Sukses', 'Hapus berhasil!');
            return to_route('material.index');
        }else{
            Alert::error('Gagal', 'Hapus gagal! Silahkan coba lagi.');
            return to_route('material.index');
        }
    }
}
