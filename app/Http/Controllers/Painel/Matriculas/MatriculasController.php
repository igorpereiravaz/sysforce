<?php

namespace App\Http\Controllers\Painel\Matriculas;

use App\Mensalidade;
use App\Plano;
use App\Cliente;
Use App\Matricula;
use App\Turma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class MatriculasController extends Controller
{
    public function __construct(Matricula $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
        $user = auth()->user();
        $role = $user->role_id;
        $title = 'Painel de Matriculados';
        $matriculas = $this->model->where('deleted_at', '=', null)->get();

        $clientes = Cliente::all();
        $planos = Plano::all();
        return view('Painel.Matriculas.index', compact('title', 'matriculas','clientes','planos','role'));
    }

    public function finish($id)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $matricula = Matricula::where('id', $id)->get()->first();

            if($matricula)
            {
                $title = 'Encerramento de Matrícula';

                return view('Painel.Matriculas.checkout', compact('title', 'matricula'));
            }
            else
                {
                return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
                }
        }
        else
            {
            return view('Painel.Usuarios.negado');
            }
    }

    public function checkout(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $matricula = Matricula::where('id', $request->input('matricula'))->get()->first();
            $dataencerramento = $request->input('datames');

            if($matricula) {
                $pagamentos = Mensalidade::where('matricula_id', $matricula->id)->get();

                $contador = 0 ;

                if($pagamentos){
                    foreach ($pagamentos as $pagamento) {
                        if($pagamento->datames == $dataencerramento)
                        {
                            $contador = $contador +1;
                        }
                    }

                    if($contador < 1 ){
                        $title = 'Encerramento de Matrícula';
                        $mensagem = 'Encerramento Inválido ! Cliente possui mensalidade a ser paga';
                        return view('Painel.Matriculas.confirm', compact('title', 'matricula','mensagem'));
                    }
                    else{
                        $data = Carbon::now('America/Sao_Paulo');
                        $matricula->updated_at =  $data;
                        $matricula->delete();
                        return redirect()->route("Painel.Matriculas.index")->with('sucess', 'Encerrado');
                    }
                }
                else{
                    $title = 'Encerramento de Matrícula';
                    $mensagem = 'Encerramento Inválido ! Cliente possui mensalidade a ser paga';
                    return view('Painel.Matriculas.confirm', compact('title', 'matricula','mensagem'));;
                }


            }
            else{
                return redirect()->route("Painel.Mensalidades.index")->with('errors', 'Busca Invalida');
                }
        }
        else {
            return view('Painel.Usuarios.negado');
            }
    }

    public function create()
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $title = 'Painel de Matriculados';
            $matriculas = Matricula::whereNull('deleted_at')->get();
            $turmas = Turma::all();
            $clientes = Cliente::all();
            $planos = Plano::all();
            return view('Painel.Matriculas.create', compact('title', 'matriculas','clientes','planos', 'turmas'));
        }
        else
            {
            return view('Painel.Usuarios.negado');
            }

    }

    public function createturma($id)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $title = 'Painel de Matriculados';
            $matriculas = Matricula::whereNull('deleted_at')->get();
            $turmas = Turma::all();
            $turmaselecionada = Turma::where('id', $id)->get()->first();
            $clientes = Cliente::all();
            $planos = Plano::all();
            return view('Painel.Matriculas.createturma', compact('title', 'matriculas','clientes','planos', 'turmas', 'turmaselecionada'));

        }
        else
            {
            return view('Painel.Usuarios.negado');
            }
    }

    public function storeturma(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $regras =[
                'cliente_id'          => 'required',
                'plano_id'           => 'required',
            ];
            $mensagens = [
                'required'              => 'O campo :attribute é obrigatório',
            ];

            $request->validate($regras, $mensagens);

            $matricula = new Matricula();

            $matricula->cliente_id = $request->input('cliente_id');
            $matricula->plano_id = $request->input('plano_id');
            $matricula->turma_id = $request->input('turma_id');
            $matricula->data = $request->input('data');

            $matricula->save();
            return redirect()->route("Painel.Turmas.index")->with('sucess', 'Casdastrado!');
        }
        else
            {
            return view('Painel.Usuarios.negado');
            }
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $regras =[
                'cliente_id'          => 'required',
                'plano_id'           => 'required',
            ];
            $mensagens = [
                'required'              => 'O campo :attribute é obrigatório',
            ];

            $request->validate($regras, $mensagens);

            $matricula = new Matricula();

            $matricula->cliente_id = $request->input('cliente_id');
            $matricula->plano_id = $request->input('plano_id');
            $matricula->turma_id = $request->input('turma_id');
            $matricula->data = $request->input('data');

            $matricula->save();
            return redirect()->route("Painel.Matriculas.index")->with('sucess', 'Casdastrado!');
        }
        else
            {
            return view('Painel.Usuarios.negado');
            }
    }

    public function edit($id)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $valida = 0;
            $cat = Matricula::find($id);
            $cliente = Cliente::where('id', $cat->cliente_id)->get()->first();
            $plano = Plano::where('id', $cat->plano_id)->get()->first();
            if ($turmacli = Turma::where('id', $cat->turma_id)->get()->first())
            {
                $valida = $valida +1;
            }

            if(isset($cat))
            {
                $title = 'Painel Alteração de Matrículas';
                $planos = Plano::all();
                $turmas = Turma::all();
                return view('Painel.Matriculas.edit', compact('title', 'planos', 'cat','cliente','plano','turmacli', 'turmas','valida'));
            }
            else
                {
                return redirect()->route("Painel.Matriculas.index");
                }
        }
        else
            {
            return view('Painel.Usuarios.negado');
            }
    }


    public function update(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $matricula = Matricula::find($request->cat_id);

            $regras =[
                'cliente_id'          => 'required',
                'plano_id'           => 'required',
            ];
            $mensagens = [
                'required'              => 'O campo :attribute é obrigatório',
            ];

            $request->validate($regras, $mensagens);

            $matricula->cliente_id = $request->input('cliente_id');
            $matricula->plano_id = $request->input('plano_id');
            $matricula->turma_id = $request->input('turma_id');
            $matricula->data = $request->input('data');

            $matricula->save();
            return redirect()->route("Painel.Matriculas.index")->with('sucess', 'Alterado!');
        }
        else
            {
            return view('Painel.Usuarios.negado');
            }
    }


    public function destroy($id)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $cat = Matricula::find($id);
            if (isset($cat))
            {
                $cat->delete();
                return redirect()->route("Painel.Matriculas.index")->with('sucess', 'Excluído!');
            } else
                {
                return redirect()->route("Painel.Matriculas.index");
                }
        }
        else
            {
            return view('Painel.Usuarios.negado');
            }
    }

    public function forceDestroy($id)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $cat = Matricula::find($id);
            if (isset($cat))
            {
                $cat->forceDelete();
                return redirect()->route("Painel.Matriculas.index")->with('sucess', 'Excluído!');
            } else
            {
                return redirect()->route("Painel.Matriculas.index");
            }
        }
        else
        {
            return view('Painel.Usuarios.negado');
        }
    }

    public function confirmDestroy($id)
    {
        $user = auth()->user();
        if($user->role_id == 1)
        {
            $cat = Matricula::find($id);
            if (isset($cat))
            {
                return view('Painel.Matriculas.confirmDestroy',compact('cat'));
            } else
            {
                return redirect()->route("Painel.Matriculas.index");
            }
        }
        else
        {
            return view('Painel.Usuarios.negado');
        }
    }

}
