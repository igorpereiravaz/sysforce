<?php

namespace App\Http\Controllers\Home;

use App\Cliente;
use App\Treinosolo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;



class HomeController extends Controller
{
    //------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {

    }
    //------------------------------------------------------------------------------------------------------------------
    public function Show()
    {
        $compact =
            [
                'title'=>'Página Principal da Home'
            ];
        return view('Home.Principal.Show', $compact);
    }


    public function index()
    {

    }

    public function treino()
    {
        return view("Home.Principal.treino");
    }

    public function list(Request $request)
    {
        $cliente = Cliente::where('cpf_cliente', $request->input('cpf_cliente'))->get()->first();
        $contador = 0 ;

        if(isset($cliente)){

            $matriculas = $cliente->matricula()->get();
            if($matriculas){
                $contador = 0;
                foreach ($matriculas as $matricula){
                    if ($matricula->deleted_at == null){
                        $contador =$contador + 1;
                    }
                }
                if($contador == 0){
                    $mensagem = 'Cliente não matrículado';
                    return view('Home.Principal.notfounduser', compact('mensagem'));
                }
                else{
                    $treinos = $cliente->treinosolos;
                    foreach ($treinos as $treino){
                        if($treino->updated_at == null){
                            $contador = $contador + 1;
                        }
                    }

                    if(isset($treinos)) {

                        if($contador != 0 ){
                            $title = 'Lista de Treinos';
                            return view('Home.Principal.list', compact('title','treinos','cliente'));
                        }
                        else{
                            $mensagem = 'Treino não encontrado';
                            return view('Home.Principal.notfounduser', compact('mensagem'));
                        }
                    }
                    else{
                        $mensagem = 'Treino não encontrado';
                        return view('Home.Principal.notfounduser', compact('mensagem'));
                    }
                }

            }
            else{
                return redirect()->route("Painel.Avaliacoes.index")->withErrors(['errors', 'Não Matrículado']);
            }

        }
        else{
            $mensagem = 'Cliente não encontrado';
            return view('Home.Principal.notfounduser', compact('mensagem'));
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
            return view('Home.Principal.view', compact('title','treinamento','data', 'cliente','exercicios'));
        }
        else{
            return redirect()->route("Home.Principal.index");
        }

//        $cliente = Cliente::where('cpf_cliente', $request->input('cpf_cliente'))->get()->first();
//
//        if(isset($cliente)){
//            $treinos = $cliente->treinosolos;
//
//            foreach ($treinos as $treino){
//                if($treino->updated_at == null){
//                    $treinamento = $treino;
//                }
//            }
//            if(isset($treinamento)) {
//                $title = 'Painel de Treinamento';
//                $data = implode('/', array_reverse(explode('-', $treinamento->data)));
//                $exercicios = $treinamento->exercicios;
//                return view('Home.Principal.view', compact('title','treinamento','data', 'cliente','exercicios'));
//            }
//            else{
//                $mensagem = 'Treino não encontrado';
//                return view('Home.Principal.notfounduser', compact('mensagem'));
//            }
//        }
//        else{
//            $mensagem = 'Cliente não encontrado';
//            return view('Home.Principal.notfounduser', compact('mensagem'));
//        }
    }

    public function gerarPDF($id)
    {
        $treinamento = Treinosolo::find($id);
        $cliente = Cliente::where('id', $treinamento->cliente_id)->get()->first();

        if(isset($treinamento)) {
            $title = 'Ficha de Treinamento';
            $data = implode('/', array_reverse(explode('-', $treinamento->data)));
            $exercicios = $treinamento->exercicios;
            $pdf = PDF::loadView('Home.Principal.treinoPDF',compact('cliente','data','exercicios','treinamento'));


            return $pdf->setPaper('a4')->stream('Treinamento.pdf');
        }
        else{
            return redirect()->route("Home.Principal.index");
        }

    }

    public function create()
    {

        return view('Home.Principal.create');
    }


    public function store(Request $request)
    {
        $regras =[
            'nome_cliente'          => 'required|min:3|',
            'cpf_cliente'           => 'required|unique:clientes',
            'nomeemer_cliente'      => 'required|min:3|'
        ];
        $mensagens = [
            'required'              => 'O campo :attribute é obrigatório',
            'nome_cliente.min'      => 'Nome inválido. Mínimo 3 caracteres',
            'cpf_cliente'           => 'Email existente! Tente outro.',
            'nomeemer_cliente.min'  => 'Nome inválido. Mínimo 3 caracteres'
        ];

        $request->validate($regras, $mensagens);

        $cliente = new Cliente();

        $cliente->cpf_cliente = $request->input('cpf_cliente');
        $cliente->nome_cliente = $request->input('nome_cliente');
        $cliente->telefone_cliente = $request->input('telefone_cliente');
        $cliente->nasc_cliente = $request->input('nasc_cliente');
        $cliente->endereco_cliente = $request->input('endereco_cliente');
        $cliente->bairro_cliente = $request->input('bairro_cliente');
        $cliente->estado_cliente = $request->input('estado_cliente');
        $cliente->cidade_cliente = $request->input('cidade_cliente');
        $cliente->nomeemer_cliente = $request->input('nomeemer_cliente');
        $cliente->telefoneemer_cliente = $request->input('telefoneemer_cliente');
        $cliente->fuma_cliente = $request->input('fuma_cliente');
        $cliente->diabete_cliente = $request->input('diabete_cliente');
        $cliente->colesterol_cliente = $request->input('colesterol_cliente');
        $cliente->cardiaco_cliente = $request->input('cardiaco_cliente');
        $cliente->qualcardiaco_cliente = $request->input('qualcardiaco_cliente');
        $cliente->lesao_cliente = $request->input('lesao_cliente');
        $cliente->locallesao_cliente = $request->input('locallesao_cliente');
        $cliente->medicamento_cliente = $request->input('medicamento_cliente');
        $cliente->qualmedicamento_cliente = $request->input('qualmedicamento_cliente');
        $cliente->atividadefisica_cliente = $request->input('atividadefisica_cliente');

        $cliente->save();

        return redirect()->route("Home.Principal.Show");

    }

    //------------------------------------------------------------------------------------------------------------------

    /*
     *
     * Funções Auxiliares
     *
     *
     */
}
