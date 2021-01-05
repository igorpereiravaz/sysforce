<?php

namespace App\Http\Controllers\Painel\Mensalidades;

use App\Cliente;
use App\Matricula;
use App\Mensalidade;
use App\Plano;
use App\Turma;
use http\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nexmo\Response;

class MensalidadesController extends Controller
{


    public function __construct(Turma $model)
    {
        $this->model = $model;
        $this->middleware('auth');

    }

    public function index()
    {
            $title = 'Painel de Mensalidades';
            $clientes = Cliente::all();
            $matriculas= Matricula::all();
            return view('Painel.Mensalidades.index', compact('title', 'clientes','matriculas'));

    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        $user = auth()->user();
        $role = $user->role_id;
            $title = 'Painel de Pagamentos';
            $cliente = Cliente::find($id);

            if($cliente){

                $matriculas = Matricula::where('cliente_id', $cliente->id)->get();
                $matriculasoffs = Matricula::onlyTrashed()->get();

                //pegando as matriculas finalizadas do cliente selecionado
                $finalizadas = [];
                foreach ($matriculasoffs as $matriculasoff){
                    if($matriculasoff->cliente_id == $cliente->id){
                        $finalizadas[] = $matriculasoff;
                    }
                }

                //pegando os pagamentos do cliente que estão com matrícula encerrada
                $todasmensalidadesfinalizadas = Mensalidade::where('id', '!=', 0)->get();
                $mensalidades = null;
                $mensalidadesfim = [];
                foreach ($todasmensalidadesfinalizadas as $todasmensalidadesfinalizada){
                    foreach ($finalizadas as $finalizada){
                        if($todasmensalidadesfinalizada->matricula_id == $finalizada->id){
                            $mensalidadesfim [] = $todasmensalidadesfinalizada;
                        }
                    }
                }
                $todasmensalidades = Mensalidade::where('id', '!=', 0)->get();
                $mensalidades = null;

                //pegando os pagamentos do cliente que estão com matrículas abertas
                foreach ($todasmensalidades as $mensalidade){
                    foreach ($matriculas as $matricula){
                        if($mensalidade->matricula_id == $matricula->id){
                            $mensalidades [] = $mensalidade;
                        }
                    }
                }
                return view('Painel.Mensalidades.show', compact('title','cliente','mensalidades','role','mensalidadesfim'));

            }

            else{
                return redirect()->route("Painel.Mensalidades.index")->with('sucess', 'Excluído!');
            }
    }


//$user = auth()->user();
//$role = $user->role_id;
//$title = 'Painel de Pagamentos';
//$cliente = Cliente::find($id);
//if($cliente){
//$matriculas = Matricula::where('cliente_id', $cliente->id)->get();
//
//if($matriculas){
//
//$matriculasoffs = Matricula::onlyTrashed()->get();
//$finalizadas = [];
//foreach ($matriculasoffs as $matriculasoff){
//if($matriculasoff->cliente_id == $cliente->id){
//$finalizadas[] = $matriculasoff;
//}
//}
//
//$todasmensalidadesfinalizadas = Mensalidade::where('id', '!=', 0)->get();
//$mensalidades = null;
//foreach ($todasmensalidadesfinalizadas as $todasmensalidadesfinalizada){
//    foreach ($finalizadas as $finalizada){
//        if($todasmensalidadesfinalizada->matricula_id == $finalizada->id){
//            $mensalidadesfim [] = $todasmensalidadesfinalizada;
//        }
//    }
//}
//
//$todasmensalidades = Mensalidade::where('id', '!=', 0)->get();
//$mensalidades = null;
//foreach ($todasmensalidades as $mensalidade){
//    foreach ($matriculas as $matricula){
//        if($mensalidade->matricula_id == $matricula->id){
//            $mensalidades [] = $mensalidade;
//        }
//    }
//}
//
//return view('Painel.Mensalidades.show', compact('title','cliente','mensalidades','role','mensalidadesfim'));
//}
//else{
//    return redirect()->route("Painel.Mensalidades.index")->with('sucess', 'Excluído!');
//}
//}
//else{
//    return redirect()->route("Painel.Mensalidades.index")->with('sucess', 'Excluído!');
//}

    public function payment($id)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $title = 'Painel de Pagamento';
            $cliente = Cliente::where('id', $id)->get()->first();
            $matricula = Matricula::where('cliente_id',$cliente->id)->where('deleted_at', '=', null)->get()->first();

            if($matricula){

                $plano = Plano::where('id', $matricula->plano_id)->get()->first();
                $data = $matricula->data;
                $datainicio = substr($data, 0, 10);

                return view('Painel.Mensalidades.payment', compact('title','cliente','matricula','plano','datainicio'));
            }
            else{
                $message = "Cliente não Matrículado";
                return redirect()->route("Painel.Mensalidades.show", $cliente->id)->withErrors($message);
            }

        }
        else{
            return view('Painel.Usuarios.negado');
        }

    }

    public function pay(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $datames = $request->input('datames');
            $matricula = $request->input('matricula_id');
            $pagamentos = Mensalidade::where('matricula_id', $matricula)->get();
            $contador = 0;

            foreach ($pagamentos as $pagamento){
                if($pagamento->datames == $datames){
                    $contador = $contador + 1;
                }
            }
            if($contador > 0){
                $error = "Mensalidade do Mês escolhido já foi paga!";
                $title = 'Painel de Mensalidades';
                $clientes = Cliente::all();
                $matriculas= Matricula::all();
                return redirect()->route("Painel.Mensalidades.index")->withErrors(['errors', 'Não Matrículado']);
            }
            else{
                $mensalidade = new Mensalidade();
                $mensalidade->valor = $request->input('valor');
                $mensalidade->datapagamento = $request->input('datapagamento');
                $mensalidade->matricula_id = $request->input('matricula_id');
                $mensalidade->datames = implode('-', array_reverse(explode('/', $request->input('datames'))));

                $mensalidade->save();
                return redirect()->route("Painel.Mensalidades.index")->with('sucess', 'Salvo!');
            }


        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }

    public function getMonth($matricula, $mesdata)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $mensalidades = Mensalidade::where('matricula_id', $matricula);
            $contador = 0 ;
            foreach ($mensalidades as $mensalidade){
                if($mensalidade->mesdata == $mesdata){
                    $contador = $contador + 1 ;
                }
            }

            if($contador > 0){
                $mensagem = 1;
            }else{
                $mensagem = 0;
            }
            return Response::json($mensagem);
        }
        else{
            return view('Painel.Usuarios.negado');
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
        $user = auth()->user();
        if($user->role_id == 1){
            $cat = Mensalidade::find($id);
            $title = 'Painel de Pagamentos';
            $cliente = Cliente::find($id);
            if(isset($cat)) {
                $cat->delete();
                return redirect()->route("Painel.Mensalidades.show", $id)->with('sucess', 'Excluído!');
            }
            else{
                return redirect()->route("Painel.Mensalidades.index");
            }
        }
        else{
            return view('Painel.Usuarios.negado');
        }

    }
}
