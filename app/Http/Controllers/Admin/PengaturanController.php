<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLoginLog;
use Alert;
class PengaturanController extends Controller
{
    public function index(){
        $userLog = UserLoginLog::with('user')->orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.pengaturan.setting', compact('userLog'));    
    }

    public function profileUpdate(Request $request, $id, User $user){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];
        $updated = $user->where('id', $id)->update($data);
        if($updated){
            Alert::success('Sukses', 'Profile berhasil diubah!');
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request, $id, User $user){
        $oldPass = $request->oldPass;
        $newPass = $request->newPass;

        $user = $user::findOrFail($id);

        if(password_verify($oldPass, $user->password)){
            $user->password = bcrypt($newPass);
            $user->save();
            Alert::success('Sukses', 'Password Anda berhasil diubah!');
            return redirect()->back();
        }else{
            Alert::error('Gagal', 'Password lama tidak sesuai!');
            return redirect()->back();
        }
    }
}
