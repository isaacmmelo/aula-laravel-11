<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        //$users = User::all();

        $users = User::paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function create(Request $request){
        return view('admin.users.create');
    }

    public function store(Request $request){


        ## $request->except('_token'); --> Recebe todos os campos menos o token
        User::create($request->all()); ## Cria o novo usuário e recebe todos os dados

        return redirect()->route('user.index');

    }
}
