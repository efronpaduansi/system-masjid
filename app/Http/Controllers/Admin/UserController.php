<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;

class UserController extends Controller
{
    public function index(User $user){
      $users = $user::orderBy('id', 'asc')->get();
      return view('admin.user.manage', compact('users'));
   }

   public function store(Request $request, User $user){
      $data = [
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'role' => $request->role
      ];

      if($user->create($data)){
         Alert::success('Sukses', 'Simpan berhasil!');
         return  to_route('user.index');
      }else{
         Alert::error('Gagal', 'Simpan gagal! Silahkan coba lagi!');
         return redirect()->back()->withInput();
      }
   }

   public function edit($id, User $user){
      $user = $user::findOrFail($id);
      return view('admin.user.form_edit', compact('user'));
   }

   public function update(Request $request, $id, User $user){
      $data = [
         'name' => $request->name,
         'email' => $request->email,
         'role' => $request->role
      ];

      if($user->where('id', $id)->update($data)){
         Alert::success('Sukses', 'Update berhasil!');
         return  to_route('user.index');
      }else{
         Alert::error('Gagal', 'Update gagal! Silahkan coba lagi!');
         return redirect()->back()->withInput();
      }
   }

   public function delete($id, User $user){
      if($user::findOrFail($id)->delete()){
         Alert::success('Sukses', 'Update berhasil!');
         return  to_route('user.index');
      }else{
         Alert::error('Gagal', 'Update gagal!');
         return  to_route('user.index');
      }
   }

}
