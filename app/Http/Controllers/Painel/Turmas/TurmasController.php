<?php

namespace App\Http\Controllers\Painel\Turmas;

use App\Matricula;
use App\Plano;
use App\Turma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TurmasController extends Controller
{


    public function __construct(Turma $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
        $user = auth()->user();
        $role = $user->role_id;
        $title = 'Painel de Turmas';
        $turmas = $this->model->where('id', '!=', 0)->get();
        $matriculas = Matricula::all();
        return view('Painel.Turmas.index', compact('title', 'turmas', 'matriculas','role'));

    }


    public function create()
    {
        $title = 'Painel Cadastro de Turmas';
        return view('Painel.Turmas.create', compact('title'));
    }


    public function store(Request $request)
    {

        $turma = new Turma();
        $turma->nome_turma = $request->input('nome_turma');
        $turma->dias = $request->input('dias');
        $turma->horario = $request->input('horario');
        $turma->save();
        return redirect()->route("Painel.Turmas.index")->with('sucess', 'Casdastrado!');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cat = Turma::find($id);

        if(isset($cat)) {
            $title = 'Painel Alteração de Turma';

            return view('Painel.Turmas.edit', compact('title','cat'));
        }
        else{
            return redirect()->route("Painel.Turmas.index");
        }
    }


    public function update(Request $request)
    {
        $turma = Turma::find($request->cat_id);
        $turma->nome_turma = $request->input('nome_turma');
        $turma->dias = $request->input('dias');
        $turma->horario = $request->input('horario');
        $turma->save();
        return redirect()->route("Painel.Turmas.index")->with('sucess', 'Alterado!');
    }


    public function destroy($id)
    {
        $cat = Turma::find($id);
        if(isset($cat)) {

            $matriculas = $cat->matricula()->first();
            $treino = $cat->treinoturmas()->first();

            if($matriculas || $treino){
                return redirect()->route("Painel.Turmas.index")->withErrors(['errors', 'Turma possui dados vinculados']);
            }
            else{
                $cat->delete();
                return redirect()->route("Painel.Turmas.index")->with('sucess', 'Excluído!');
            }

        }
        else{
            return redirect()->route("Painel.Turmas.index");
        }
    }

    public function confirmDestroy($id)
    {
        $user = auth()->user();

        $cat = Turma::find($id);
        if (isset($cat))
        {
            return view('Painel.Turmas.confirmDestroy',compact('cat'));
        }
        else
        {
            return redirect()->route("Painel.Turmas.index");
        }

    }

}
