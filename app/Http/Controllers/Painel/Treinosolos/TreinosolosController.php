<?php

namespace App\Http\Controllers\Painel\Treinosolos;

use App\Cliente;
use App\Exercicio;
use http\Message;
use App\Treinosolo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nexmo\Response;
use Carbon\Carbon;

class TreinosolosController extends Controller
{


    public function __construct(Treinosolo $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
        $title = 'Painel de Treino Individual';
        $clientes = Cliente::all();
        return view('Painel.Treinosolos.index', compact('title', 'clientes'));
    }


    public function create($id)
    {
        $exercicios = Exercicio::all();
        $title = 'Painel de Treino';
        $cliente = Cliente::where('id', $id)->get()->first();
        return view('Painel.Treinosolos.create', compact('title','cliente','exercicios'));
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

        $treino = new Treinosolo();
        $treino->nome = $request->input('nome');
        $treino->data = $request->input('data');
        $treino->cliente_id = $request->input('cliente_id');
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
        $cliente = Cliente::find($treino->cliente_id);
        $treinos = $cliente->treinosolos;
        return view('Painel.Treinosolos.show', compact('title','cliente','treinos'));


    }


    public function show($id)
    {
        $title = 'Painel de Treinos';
        $cliente = Cliente::find($id);
        if($cliente){

            $treinos = $cliente->treinosolos;

            return view('Painel.Treinosolos.show', compact('title','cliente','treinos'));

        }
        else{
            return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
        }
    }

    public function finish($id)
    {
        $treino = Treinosolo::where('id', $id)->get()->first();

        if($treino){

            $title = 'Painel de Avaliações';
            $cliente = Cliente::find($treino->cliente_id);
            $data = Carbon::now('America/Sao_Paulo');
            $treino->updated_at =  $data;
            $treino->save();

            $treinos = $cliente->treinosolos;

            return view('Painel.Treinosolos.show', compact('title','cliente','treinos'));

        }
        else{
            return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
        }
    }

    public function view($id)
    {
        $treinamento = Treinosolo::find($id);
        $cliente = Cliente::where('id', $treinamento->cliente_id)->get()->first();

        if(isset($treinamento)) {
            $title = 'Painel de Treinamento';
            $data =  $treinamento->data;
            $exercicios = $treinamento->exercicios;
            return view('Painel.Treinosolos.view', compact('title','treinamento','data', 'cliente','exercicios'));
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
        $treino = Treinosolo::where('id', $id)->get()->first();

        if($treino){

            $title = 'Painel de Avaliações';
            $cliente = Cliente::find($treino->cliente_id);
            $treino->delete();

            $treinos = $cliente->treinosolos;

            return view('Painel.Treinosolos.show', compact('title','cliente','treinos'));

        }
        else{
            return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
        }
    }
}
