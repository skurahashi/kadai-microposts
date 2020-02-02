<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    //  ユーザ一覧表示処理
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    //  ユーザ詳細取得表示処理
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
}
