<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $listUser = Admin::all();
        return view('/admin/user/list-user', ['list' => $listUser]);
    }

    public function create()
    {
        return view('/admin/user/create');
    }

    public function storeAdmin(Request $request)
    {
        $admin = new Admin();
        $admin->fill($request->all());
        $admin->save();
        return redirect('/user');
    }

    public function update(Request $request, $id)
    {
        $obj = Admin::find($id);
        if ($obj == null) {
            return view('error.404');
        }
        $obj->fill($request->all());
        $obj->save();
        return redirect('/user');
    }

    public function edit($id)
    {
        //
        $obj = Admin::find($id);
        if ($obj == null) {
            return view('error.404');
        }
        return view('/admin/user/edit', ['obj' => $obj]);
    }

    public function destroy($id)
    {
        $obj = Admin::find($id);
        if ($obj == null) {
            return view('error.404');
        }
        $obj->delete();
        return redirect('/user');
    }

    /*  của trang home  */

    public function register()
    {
        return view('home.form-register');
    }

    public function login()
    {
        return view('/client/login');
    }

    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->fill($request->all());
        $admin->save();
        return redirect('home/login');
    }
}
