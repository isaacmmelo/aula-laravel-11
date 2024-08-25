<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (User::create($request->all())){
            return redirect()->route('user.index')->with('message','Erro ao inserir usuário');
        }

        return redirect()->route('user.index')->with('message','Usuário inserido com sucesso');;

    }

    public function edit(String $id){

        ##$user = User::where('id', $id)->first();
        ##$user = User::where('id', $id)->firstOrFail();
        if (!$user = User::find($id)){
            return redirect()->route('user.index')->with('message','Usuário não encontrado');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, String $id){

        if (!$user = User::find($id)){
            return back()->with('message','Usuário não encontrado');
        }

        $user->update($request->only('name', 'email'));
        return redirect()->route('user.index')->with('message','Usuário atualizado com sucesso');

    }

    public function show(String $id){

        if (!$user = User::find($id)){
            return redirect()->route('user.index')->with('message','Usuário não encontrado');
        }

        return view('admin.users.show', compact('user'));

    }

    public function destroy(String $id){

        if (!$user = User::find($id)){
            return back()->with('message','Usuário não encontrado');
        }

        if (Auth::user()->id === $user->id){
            return back()->with('message','Não pode deletar o próprio perfil');
        }

        $user->delete();

        return redirect()->route('user.index')->with('message','Usuário excluído com sucesso');
    }
}
