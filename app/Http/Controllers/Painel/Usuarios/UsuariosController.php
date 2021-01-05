<?php

namespace App\Http\Controllers\Painel\Usuarios;

use App\Models\System\Roles\Roles;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $title = 'Painel de usuários';
            $usuarios = $this->model->where('id', '!=', 0)->get();
            return view('Painel.Usuarios.index', compact('title', 'usuarios'));
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function create()
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $title = 'Painel Cadastro de Usuários';
            $roles = Roles::all();
            return view('Painel.Usuarios.create', compact('title','roles'));
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $regras =[
                'name'      => 'required|min:3|',
                'email'     => 'required|email|unique:users',
                'password'  => 'required|min:8|',
                'role_id'   => 'required'
            ];
            $mensagens = [
                'required'      => 'O campo :attribute é obrigatório',
                'name.min'      => 'Nome inválido. Mínimo 3 caracteres',
                'email.email'   => 'Digite um email válido',
                'email.unique'  => 'Email existente! Tente outro.'
            ];

            $request->validate($regras, $mensagens);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user['password'] = \Hash::make($request['password']);
            $user->role_id = $request->input('role_id');
            $user->save();
            return redirect()->route("Painel.Usuarios.index")->with('sucess', 'Casdastrado!');

        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $cat = User::find($id);

            if(isset($cat)) {
                $oldemail = $cat->email;
                $title = 'Painel Alteração de Usuários';
                $roles = Roles::all();
                return view('Painel.Usuarios.edit', compact('title', 'roles', 'cat','oldemail'));
            }
            else{
                return redirect()->route("Painel.Usuarios.index");
            }
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function update(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $user = User::find($request->cat_id);
            $oldemail = $request->oldemail;
            $regras =[
                'name'      => 'required|min:3|',
                'password'  => 'required|min:8|',
                'role_id'   => 'required',
                'email'     => 'required|unique:users,email,'.$user->id,
            ];
            $mensagens = [
                'required'      => 'O campo :attribute é obrigatório',
                'name.min'      => 'Nome inválido. Mínimo 3 caracteres',
            ];

            $request->validate($regras, $mensagens);


            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user['password'] = \Hash::make($request['password']);
            $user->role_id = $request->input('role_id');
            $user->save();
            return redirect()->route("Painel.Usuarios.index")->with('sucess', 'Alterado!');
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function destroy($id)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $cat = User::find($id);
            if(isset($cat)) {
                $cat->delete();
                return redirect()->route("Painel.Usuarios.index")->with('sucess', 'Excluído!');
            }
            else{
                return redirect()->route("Painel.Usuarios.index");
            }
        }
        else{
            return view('Painel.Usuarios.negado');
        }

    }
}
