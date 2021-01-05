<?php

namespace App\Http\Controllers\Painel\Exercicios;

use App\Exercicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciciosController extends Controller
{
    public function __construct(Exercicio $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }
    public function index()
    {
        $title = 'Painel de Exercícios';
        $exercicios = $this->model->where('id', '!=', 0)->get();
        return view('Painel.Exercicios.index', compact('title', 'exercicios'));
    }

    public function create()
    {
        $title = 'Painel Cadastro de Exercícios';
        return view('Painel.Exercicios.create', compact('title'));
    }


    public function store(Request $request)
    {
        $regras =[
                'nome_exercicio'        => 'required|min:3|unique:exercicios',

        ];
        $mensagens = [
            'required'               => 'O campo :attribute é obrigatório',
            'nome_exercicio.min'         => 'Nome inválido. Mínimo 3 caracteres',
            'nome_exercicio.unique'           => 'Nome de Exercício indisponível',

        ];

        $request->validate($regras, $mensagens);

        $exercicio = new Exercicio();
        $exercicio->nome_exercicio = $request->input('nome_exercicio');
        $exercicio->save();
        return redirect()->route("Painel.Exercicios.index")->with('sucess', 'Casdastrado!');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cat = Exercicio::find($id);

        if(isset($cat)) {
            $title = 'Painel Alteração de Exercício';

            return view('Painel.Exercicios.edit', compact('title','cat'));
        }
        else{
            return redirect()->route("Painel.Exercicios.index");
        }
    }


    public function update(Request $request)
    {
        $exercicio = Exercicio::find($request->cat_id);

        $regras =[
            'nome_exercicio'        => 'required|min:3|unique:exercicios,nome_exercicio,'.$exercicio->id,

        ];
        $mensagens = [
            'required'               => 'O campo :attribute é obrigatório',
            'nome_exercicio.min'         => 'Nome inválido. Mínimo 3 caracteres',
            'nome_exercicio.unique'           => 'Nome de Exercício indisponível',

        ];

        $request->validate($regras, $mensagens);


        $exercicio->nome_exercicio = $request->input('nome_exercicio');
        $exercicio->save();
        return redirect()->route("Painel.Exercicios.index")->with('sucess', 'Alterado!');
    }


    public function destroy($id)
    {
        $cat = Exercicio::find($id);
        if(isset($cat)) {
            $treinosolos = $cat->treinosolos()->first();
            $treinoturmas = $cat->treinoturmas()->first();

            if($treinosolos || $treinoturmas){
                return redirect()->route("Painel.Exercicios.index")->withErrors(['errors', 'Exercicio está vinculado a Treinos']);
            }else{
                $cat->delete();
                return redirect()->route("Painel.Exercicios.index")->with('sucess', 'Excluído!');
            }

        }
        else{
            return redirect()->route("Painel.Exercicios.index");
        }
    }
}
