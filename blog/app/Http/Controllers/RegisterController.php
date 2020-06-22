<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('demovalidation');
    }

    public function postRegister(Request $request){
        $this->validate($request,
            [
                'username' => 'required|unique:users,name',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:32',
                'rePassword' => 'required|same:password'
            ],
            [
                'username.required' => 'Bạn chưa nhâp tên người dùng',
                'username.unique' => 'Tên người dùng đã tồn tại',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Nhập sai định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu có ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu có nhiều nhất 32 ký tự',
                'rePassword.required' => 'Bạn chưa nhập lại mật khẩu',
                'rePassword.same' => 'Mật khẩu nhập lại không đúng'
            ]);

        $user = new users;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/register')->with('thongbao','Đăng ký thành công');
    }
}
