<?php

namespace App\Http\Controllers\Painel\Avaliacoes;

use App\Cliente;
use App\Avaliacao;
use App\Exercicio;
use App\Matricula;
use App\Mensalidade;
use http\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nexmo\Response;

class AvaliacoesController extends Controller
{
    public function __construct(Cliente $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
        $title = 'Painel de Avaliações';
        $clientes = Cliente::all();
        return view('Painel.Avaliacoes.index', compact('title', 'clientes'));
    }

    public function create()
    {

    }



    public function store(Request $request)
    {
        $regras =[
            'busto'                 => 'required',
            'bracoDireito'          => 'required',
            'bracoEsquerdo'         => 'required',
            'antebracoDireito'      => 'required',
            'antebracoEsquerdo'     => 'required',
            'peito'                 => 'required',
            'cintura'               => 'required',
            'quadril'               => 'required',
            'coxaDireita'           => 'required',
            'coxaEsquerda'          => 'required',
            'panturrilhaDireita'    => 'required',
            'panturrilhaEsquerda'   => 'required',
            'altura'                => 'required',
            'peso'                  => 'required',
        ];
        $mensagens = [
            'required'               => 'O campo :attribute é obrigatório',
        ];

        $request->validate($regras, $mensagens);

        $avaliacao = new Avaliacao();

        $avaliacao->busto = $request->input('busto');
        $avaliacao->bracoDireito = $request->input('bracoDireito');
        $avaliacao->bracoEsquerdo = $request->input('bracoEsquerdo');
        $avaliacao->antebracoDireito = $request->input('antebracoDireito');
        $avaliacao->antebracoEsquerdo = $request->input('antebracoEsquerdo');
        $avaliacao->peito = $request->input('peito');
        $avaliacao->cintura = $request->input('cintura');
        $avaliacao->quadril = $request->input('quadril');
        $avaliacao->coxaDireita = $request->input('coxaDireita');
        $avaliacao->coxaEsquerda = $request->input('coxaEsquerda');
        $avaliacao->panturrilhaDireita = $request->input('panturrilhaDireita');
        $avaliacao->panturrilhaEsquerda = $request->input('panturrilhaEsquerda');
        $avaliacao->altura = $request->input('altura');

        $pesovirgula = $request->input('peso');
        $pesoreal = $pesovirgula = str_replace(',', '.',$pesovirgula);

        $avaliacao->peso = $pesoreal;
        $avaliacao->data = $request->input('data');
        $avaliacao->cliente_id = $request->input('cliente_id');
        $altura = $avaliacao->altura /100;
        $altura2 = $altura*$altura;
        $peso = $avaliacao->peso;
        $imc = $peso/$altura2;
        $avaliacao->imc = $imc;

        $avaliacao->save();

        $avaliacoes = Avaliacao::where('cliente_id', $avaliacao->cliente_id)->get();
        $cliente = Cliente::find($avaliacao->cliente_id);
        $title = 'Painel de Avaliações';
        return view('Painel.Avaliacoes.show', compact('title','cliente','avaliacoes'));

    }

    public function show($id)
    {
        $title = 'Painel de Avaliações';
        $cliente = Cliente::find($id);
        if($cliente){

            $avaliacoes = Avaliacao::where('cliente_id', $cliente->id)->get();
            return view('Painel.Avaliacoes.show', compact('title','cliente','avaliacoes'));

        }
        else{
            return redirect()->route("Painel.Avaliacoes.index")->with('errors', 'Busca Invalida');
        }
    }

    public function view($id)
    {
        $avaliacao = Avaliacao::find($id);
        $cliente = Cliente::where('id', $avaliacao->cliente_id)->get()->first();

        if(isset($avaliacao)) {
            $title = 'Painel de Avaliação';
            $data = implode('/', array_reverse(explode('-', $avaliacao->data)));
            return view('Painel.Avaliacoes.view', compact('title','avaliacao','data', 'cliente'));
        }
        else{
            return redirect()->route("Painel.Exercicios.index");
        }
    }

    public function edit($id)
    {
        $cat = Avaliacao::find($id);
        $cliente = Cliente::find($cat->cliente_id);

        if(isset($cat)) {
            $title = 'Painel Alteração de Avaliação';

            $data = $cat->data;

            return view('Painel.Avaliacoes.edit', compact('title','cat', 'data','cliente'));
        }
        else{
            return redirect()->route("Painel.Clientes.index");
        }
    }


    public function update(Request $request)
    {
        $avaliacao = Avaliacao::find($request->cat_id);

        $regras =[
            'busto'                 => 'required',
            'bracoDireito'          => 'required',
            'bracoEsquerdo'         => 'required',
            'antebracoDireito'      => 'required',
            'antebracoEsquerdo'     => 'required',
            'peito'                 => 'required',
            'cintura'               => 'required',
            'quadril'               => 'required',
            'coxaDireita'           => 'required',
            'coxaEsquerda'          => 'required',
            'panturrilhaDireita'    => 'required',
            'panturrilhaEsquerda'   => 'required',
            'altura'                => 'required',
            'peso'                  => 'required',
        ];
        $mensagens = [
            'required'               => 'O campo :attribute é obrigatório',
        ];

        $request->validate($regras, $mensagens);

        $avaliacao->busto = $request->input('busto');
        $avaliacao->bracoDireito = $request->input('bracoDireito');
        $avaliacao->bracoEsquerdo = $request->input('bracoEsquerdo');
        $avaliacao->antebracoDireito = $request->input('antebracoDireito');
        $avaliacao->antebracoEsquerdo = $request->input('antebracoEsquerdo');
        $avaliacao->peito = $request->input('peito');
        $avaliacao->cintura = $request->input('cintura');
        $avaliacao->quadril = $request->input('quadril');
        $avaliacao->coxaDireita = $request->input('coxaDireita');
        $avaliacao->coxaEsquerda = $request->input('coxaEsquerda');
        $avaliacao->panturrilhaDireita = $request->input('panturrilhaDireita');
        $avaliacao->panturrilhaEsquerda = $request->input('panturrilhaEsquerda');
        $avaliacao->altura = $request->input('altura');

        $pesovirgula = $request->input('peso');
        $pesoreal = $pesovirgula = str_replace(',', '.',$pesovirgula);

        $avaliacao->peso = $pesoreal;
        $avaliacao->data = $request->input('data');
        $avaliacao->cliente_id = $request->input('cliente_id');
        $altura = $avaliacao->altura /100;
        $altura2 = $altura*$altura;
        $peso = $avaliacao->peso;
        $imc = $peso/$altura2;
        $avaliacao->imc = $imc;
        $avaliacao->save();

        return redirect()->route("Painel.Avaliacoes.index")->with('sucess', 'Alterado!');

    }

    public function new ($id)
    {
        $title = 'Painel de Avaliação';
        $cliente = Cliente::where('id', $id)->get()->first();
        $matriculas = $cliente->matricula()->get();
        if($matriculas){
            $contador = 0;
            foreach ($matriculas as $matricula){
                if ($matricula->deleted_at == null){
                    $contador =$contador + 1;
                }
            }
            if($contador == 0){
                return redirect()->route("Painel.Avaliacoes.index")->withErrors(['errors', 'Não Matrículado']);
            }
            else{
                return view('Painel.Avaliacoes.create', compact('title','cliente'));
            }

        }
        else{
            return redirect()->route("Painel.Avaliacoes.index")->withErrors(['errors', 'Não Matrículado']);
        }
    }

    public function destroy($id)
    {
        $cat = Avaliacao::find($id);
        if(isset($cat)) {

            $cat->delete();

            return redirect()->route("Painel.Avaliacoes.index")->with('sucess', 'Excluído!');
        }
        else{
            return redirect()->route("Painel.Avaliacoes.index");
        }
    }
}
