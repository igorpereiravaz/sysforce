<?php

namespace App\Http\Controllers\Painel\Planos;

use App\Plano;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanosController extends Controller
{


    public function __construct(Plano $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
        $user = auth()->user();
        $role = $user->role_id;
        $title = 'Painel de Planos';
        $planos = $this->model->where('id', '!=', 0)->get();
        return view('Painel.Planos.index', compact('title', 'planos','role'));
    }


    public function create()
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $title = 'Painel Cadastro de Planos';
            return view('Painel.Planos.create', compact('title'));
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
                'nome_plano'        => 'required|min:3|',

            ];
            $mensagens = [
                'required'               => 'O campo :attribute é obrigatório',
                'nome_plano.min'         => 'Nome inválido. Mínimo 3 caracteres',

            ];

            $request->validate($regras, $mensagens);

            $plano = new Plano();
            $plano->nome_plano = $request->input('nome_plano');
            $plano->valor_plano = $request->input('valor_plano');
            $valor = $plano->valor_plano = str_replace(',', '.',$plano->valor_plano);
            $plano->valor_plano = $valor;
            $plano->qtdtreino_plano = $request->input('qtdtreino_plano');
            $plano->save();
            return redirect()->route("Painel.Planos.index")->with('sucess', 'Casdastrado!');
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
            $cat = Plano::find($id);

            if(isset($cat)) {
                $title = 'Painel Alteração de Plano';

                return view('Painel.Planos.edit', compact('title','cat'));
            }
            else{
                return redirect()->route("Painel.Planos.index");
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
            $plano = Plano::find($request->cat_id);

            $regras =[
                'nome_plano'        => 'required|min:3|',

            ];
            $mensagens = [
                'required'               => 'O campo :attribute é obrigatório',
                'nome_plano.min'         => 'Nome inválido. Mínimo 3 caracteres',

            ];

            $request->validate($regras, $mensagens);


            $plano->nome_plano = $request->input('nome_plano');
            $plano->valor_plano = $request->input('valor_plano');
            $valor = $plano->valor_plano = str_replace(',', '.',$plano->valor_plano);
            $plano->valor_plano = $valor;
            $plano->qtdtreino_plano = $request->input('qtdtreino_plano');
            $plano->save();
            return redirect()->route("Painel.Planos.index")->with('sucess', 'Alterado!');
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function destroy($id)
    {
        $user = auth()->user();
        if($user->role_id == 1){

            $cat = Plano::find($id);
            if(isset($cat)) {
                $matriculas = $cat->matricula()->first();
                if($matriculas){
                    return redirect()->route("Painel.Planos.index")->withErrors(['errors', 'Plano possui dados vinculados']);
                }
                else{
                    $cat->delete();
                    return redirect()->route("Painel.Planos.index")->with('sucess', 'Excluído!');
                }

            }
            else{
                return redirect()->route("Painel.Planos.index");
            }
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }

    public function confirmDestroy($id)
    {
        $user = auth()->user();

        $cat = Plano::find($id);
        if (isset($cat))
        {
            return view('Painel.Planos.confirmDestroy',compact('cat'));
        }
        else
        {
            return redirect()->route("Painel.Planos.index");
        }

    }
}
