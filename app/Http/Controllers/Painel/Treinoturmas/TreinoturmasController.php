<?php

namespace App\Http\Controllers\Painel\Treinoturmas;

use App\Exercicio;
use App\Treinoturma;
use App\Turma;
use http\Message;
use App\Treinosolo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nexmo\Response;
use Carbon\Carbon;

class TreinoturmasController extends Controller
{


    public function __construct(Treinoturma $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
        $title = 'Painel de Treino Individual';
        $turmas = Turma::all();
        return view('Painel.Treinoturmas.index', compact('title', 'turmas'));
    }


    public function create($id)
    {
        $exercicios = Exercicio::all();
        $title = 'Painel de Treino';
        $turma = Turma::where('id', $id)->get()->first();
        return view('Painel.Treinoturmas.create', compact('title','turma','exercicios'));
    }


    public function store(Request $request)
    {

        $regras =[
            'exercicio'                 => 'required',

        ];
        $mensagens = [
            'required'               => 'Para criar um treino é necessário selecionar um ou mais exercícios.',
        ];

        $request->validate($regras, $mensagens);

        $treino = new Treinoturma();
        $treino->nome = $request->input('nome');
        $treino->data = $request->input('data');
        $treino->turma_id = $request->input('turma_id');
        $treino->updated_at = null;
        $treino->save();
        $exercicios = $request->input('exercicio');



        $treino->exercicios()->attach($exercicios);

//        $exercicios = $request->input('exercicio');
//        $id = 0 ;
//
//        foreach ($exercicios as $exercicio) {
//            $id = $exercicio;
//            echo $id;
//        }

        $title = 'Painel de Treinos';
        $turma = Turma::find($treino->turma_id);
        $treinos = $turma->treinoturmas;
        return view('Painel.Treinoturmas.show', compact('title','turma','treinos'));


    }


    public function show($id)
    {
        $title = 'Painel de Treinos';
        $turma = Turma::find($id);
        if($turma){

            $treinos = $turma->treinoturmas;

            return view('Painel.Treinoturmas.show', compact('title','turma','treinos'));

        }
        else{
            return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
        }
    }

    public function finish($id)
    {
        $treino = Treinoturma::where('id', $id)->get()->first();

        if($treino){

            $title = 'Painel de Treino';
            $turma = Turma::find($treino->turma_id);
            $data = Carbon::now('America/Sao_Paulo');
            $treino->updated_at =  $data;
            $treino->save();

            $treinos = $turma->treinoturmas;

            return view('Painel.Treinoturmas.show', compact('title','turma','treinos'));

        }
        else{
            return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
        }
    }

    public function view($id)
    {
        $treino = Treinoturma::find($id);
        $turma = Turma::where('id', $treino->turma_id)->get()->first();

        if(isset($treino)) {
            $title = 'Painel de Treinamento';
            $data = implode('/', array_reverse(explode('-', $treino->data)));
            $exercicios = $treino->exercicios;
            return view('Painel.Treinoturmas.view', compact('title','treino','data', 'turma','exercicios'));
        }
        else{
            return redirect()->route("Painel.Exercicios.index");
        }
    }


    public function edit($id)
    {

    }


    public function update(Request $request)
    {

    }


    public function destroy($id)
    {
        $treino = Treinoturma::where('id', $id)->get()->first();

        if($treino){

            $title = 'Painel de Treino';
            $turma = Turma::find($treino->cturma_id);
            $treino->delete();

            $treinos = $turma->treinosolos;

            return view('Painel.Treinosolos.show', compact('title','turma','treinos'));

        }
        else{
            return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
        }
    }
}
