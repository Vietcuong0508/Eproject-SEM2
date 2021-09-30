<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $listUser = User::all();
        return view('admin.user.list-user', ['list' => $listUser]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function getRegister()
    {
        return view('client.register');
    }

    public function getLogin()
    {
        return view('client.login');
    }

    public function postRegister(FormUserRequest $request)
    {
        $user = new User();
        $request->validated();
        $user->fill($request->all());
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect()->route('login')
            ->with('success', 'Đăng kí thành công');
    }

    public function postLogin(Request $request) {
        $arr = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if( Auth::attempt($arr)) {
            // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
            return redirect()->route('index');
        } else {
            // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
            return back()->with('error-login', 'Tài khoản hoặc mật khẩu không hợp lệ. Vui lòng kiểm tra và thử lại.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function storeAdmin(FormUserRequest $request)
    {
        $user = new User();
        $request->validated();
        $user->fill($request->all());
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect('/user')->with('storeAdmin','Thêm mới tài khoản thành công');
    }

    public function update(FormUserRequest $request, $id)
    {
        $obj = User::find($id);
        if ($obj == null) {
            return view('error.404');
        }
        $request->validated();
        $obj->update($request->all());
        $obj->save();
        return redirect('/user')->with('update','Update tài khoản thành công');
    }

    public function edit($id)
    {
        //
        $obj = User::find($id);
        if ($obj == null) {
            return view('error.404');
        }
        return view('admin.user.edit', ['obj' => $obj]);
    }

    public function destroy($id)
    {
        $obj = User::find($id);
        if ($obj == null) {
            return view('error.404');
        }
        $obj->delete();
        return redirect('/user')->with('destroy','Xóa tài khoản thành công');;
    }
}
