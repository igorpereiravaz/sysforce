<?php

namespace App\Http\Controllers\Painel\Clientes;

use App\Avaliacao;
use App\Cliente;
Use App\Matricula;
use App\Treinosolo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller
{
    public function __construct(Cliente $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }
    public function index()
    {
        $title = 'Painel de Clientes';
        $clientes = $this->model->where('id', '!=', 0)->get();
        $matriculas = Matricula::all();
        return view('Painel.Clientes.index', compact('title', 'clientes','matriculas'));
    }

    public function create()
    {
        $title = 'Painel Cadastro de Clientes';
        return view('Painel.Clientes.create', compact('title'));
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
        $cliente->nasc_cliente = implode('-', array_reverse(explode('/', $request->input('nasc_cliente'))));
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
        return redirect()->route("Painel.Clientes.index")->with('sucess', 'Casdastrado!');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cat = Cliente::find($id);

        if(isset($cat)) {
            $title = 'Painel Alteração de Cliente';

            $data = implode('/', explode('-', $cat->nasc_cliente));

            return view('Painel.Clientes.edit', compact('title','cat', 'data'));
        }
        else{
            return redirect()->route("Painel.Clientes.index");
        }
    }


    public function update(Request $request)
    {
        $cliente = Cliente::find($request->cat_id);

        $regras =[
            'nome_cliente'          => 'required|min:3|',
            'cpf_cliente'           => 'required|unique:clientes,cpf_cliente,'.$cliente->id,
            'nomeemer_cliente'      => 'required|min:3|'
        ];
        $mensagens = [
            'required'              => 'O campo :attribute é obrigatório',
            'nome_cliente.min'      => 'Nome inválido. Mínimo 3 caracteres',
            'cpf_cliente'           => 'Email existente! Tente outro.',
            'nomeemer_cliente.min'  => 'Nome inválido. Mínimo 3 caracteres'
        ];

        $request->validate($regras, $mensagens);


        $cliente->cpf_cliente = $request->input('cpf_cliente');
        $cliente->nome_cliente = $request->input('nome_cliente');
        $cliente->telefone_cliente = $request->input('telefone_cliente');
        $cliente->nasc_cliente = $request->input('nasc_cliente');
        $cliente->nasc_cliente = implode('-', array_reverse(explode('/', $request->input('nasc_cliente'))));
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
        return redirect()->route("Painel.Clientes.index")->with('sucess', 'Alterado!');
    }


    public function destroy($id)
    {
        $cat = Cliente::find($id);
        $treinosolos = Treinosolo::where('cliente_id', '=', $id)->first();
        $matricula = Matricula::where('cliente_id', '=', $id)->first();
        $avaliacao = Avaliacao::where('cliente_id', '=', $id)->first();


        if(isset($cat)) {
            if( $treinosolos || $matricula || $avaliacao ) {
                return redirect()->route("Painel.Clientes.index")->withErrors(['errors', 'Cliente possui dados vinculados']);
            }
            else{
                $cat->forceDelete();
                return redirect()->route("Painel.Clientes.index")->with('sucess', 'Excluído!');
            }

        }
        else{
            return redirect()->route("Painel.Clientes.index");
        }
    }

    public function confirmDestroy($id)
    {
        $user = auth()->user();

            $cat = Cliente::find($id);
            if (isset($cat))
            {
                return view('Painel.Clientes.confirmDestroy',compact('cat'));
            }
            else
            {
                return redirect()->route("Painel.Clientes.index");
            }

    }
}
