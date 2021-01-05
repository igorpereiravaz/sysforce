<?php

namespace App\Http\Controllers\Painel\Relatorios;

use App\Avaliacao;
use App\Cliente;
use App\Matricula;
use App\Mensalidade;
use App\Plano;
use Cassandra\Date;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class RelatoriosController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    public function choseLucro()
    {
        $user = auth()->user();
        if($user->role_id == 1) {
            $title = 'Painel de Relatórios';

            return view('Painel.Relatorios.choseLucro');
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }

    public function viewLucro(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1) {
            $datames = $request->input('datames');
            $mensalidades = Mensalidade::all();

            $mes = substr($datames, 0, 2);
            $ano = substr($datames, 3, 6);

            $pagamentos = [];
            $lucro = 0;
            $title = 'Relatório de Mensalidades';
            $clientes = Cliente::all();
            $matriculas = Matricula::withTrashed()->get();
            $matriculaspagos = [];


            foreach ($mensalidades as $mensalidade) {
                $pago = $mensalidade->datapagamento;
                $mespago = substr($pago, 5, 2);
                $anopago = substr($pago, 0, 4);

                if ($mes == $mespago and $ano == $anopago) {
                    $pagamentos[] = $mensalidade;
                    $lucro = $lucro + $mensalidade->valor;
                }
            }



            foreach ($pagamentos as $pagamento) {
                foreach ($matriculas as $matricula) {
                    if ($matricula->id == $pagamento->matricula_id) {
                        $matriculaspagos[] = $matricula;
                    }
                }
            }

     return view('Painel.Relatorios.viewLucro', compact('title', 'clientes', 'pagamentos', 'lucro', 'matriculaspagos', 'datames'));
        }else{
            return view('Painel.Usuarios.negado');
        }

    }

    public function lucroPDF($datames)
    {
        $user = auth()->user();
        if($user->role_id == 1) {

            $mensalidades = Mensalidade::all();

            $mes = substr($datames, 0, 2);
            $ano = substr($datames, 3, 6);

            $pagamentos = [];
            $lucro = 0;
            $title = 'Relatório de Mensalidades';
            $clientes = Cliente::all();
            $matriculas = Matricula::withTrashed()->get();
            $matriculaspagos = [];


            foreach ($mensalidades as $mensalidade) {
                $pago = $mensalidade->datapagamento;
                $mespago = substr($pago, 5, 2);
                $anopago = substr($pago, 0, 4);

                if ($mes == $mespago and $ano == $anopago) {
                    $pagamentos[] = $mensalidade;
                    $lucro = $lucro + $mensalidade->valor;
                }
            }

            foreach ($pagamentos as $pagamento) {
                foreach ($matriculas as $matricula) {
                    if ($matricula->id == $pagamento->matricula_id) {
                        $matriculaspagos[] = $matricula;
                    }
                }
            }


            $pdf = PDF::loadView('Painel.Relatorios.lucroPDF',compact( 'clientes', 'pagamentos',
                                                                        'lucro', 'matriculaspagos', 'datames'));

            return $pdf->setPaper('a4')->stream('lucroPDF.pdf');
        }else{
            return view('Painel.Usuarios.negado');
        }

    }

    public function choseCliente()
    {
        $user = auth()->user();
        if($user->role_id == 1) {
            $title = 'Painel de Relatórios';

            return view('Painel.Relatorios.choseClientes');
        }
        else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function viewClientes(Request $request)
    {
        $user = auth()->user();
        if($user->role_id == 1) {

            $title = 'Painel de Relatórios';
            $datames = $request->input('datames');
            $dia = '01';
            $mes = substr($datames, 0, 2);
            $ano = substr($datames, 3, 6);
            $dataString = $mes."-".$dia."-".$ano;
            $dataFiltro = DateTime::createFromFormat('m-d-Y', $dataString)->format('Y-m-d');

            $matriculaspagas = [];
            $matriculasnpagas = [];
            $total = 0.00;

            $mensalidades = Mensalidade::all();
            $clientes = Cliente::all();
            $matriculas = Matricula::whereNull('deleted_at')->get();
            $planos = Plano::all();

            foreach ($matriculas as $matricula){

                $diamat = '01';
                $mesmat = substr($matricula->data, 5, 2);
                $anomat = substr($matricula->data, 0, 4);
                $datamat = $mesmat."-".$diamat."-".$anomat;
                $datamatricula = DateTime::createFromFormat('m-d-Y', $datamat)->format('Y-m-d');
                $contador = 0;

                if($datamatricula > $dataFiltro)
                {
                    $contador = $contador + 1;
                }
                else if($datamatricula <= $dataFiltro){
                    foreach($mensalidades as $mensalidade) {
                        if($matricula->id == $mensalidade->matricula_id and $mensalidade->datames == $datames) {
                                $contador = $contador + 1;
                        }
                    }
                }

                if($contador > 0){
                    $matriculaspagas  [] = $matricula;
                }
                else{
                    $matriculasnpagas  [] = $matricula;
                }
            }

            foreach ($matriculasnpagas as $matriculasnpaga){
                foreach ($planos as $plano){
                    if($plano->id == $matriculasnpaga->plano_id){
                        $total = $total + $plano->valor_plano;

                    }
                }
            }



            return view('Painel.Relatorios.viewClientes', compact('title','clientes','matriculasnpagas','datames', 'total'));

        }else{
            return view('Painel.Usuarios.negado');
        }
    }

    public function clientesPDF($datames)
    {
        $user = auth()->user();
        if($user->role_id == 1) {
            $title = 'Painel de Relatórios';
            $datames = $datames;
            $dia = '01';
            $mes = substr($datames, 0, 2);
            $ano = substr($datames, 3, 6);
            $dataString = $mes."-".$dia."-".$ano;
            $dataFiltro = DateTime::createFromFormat('m-d-Y', $dataString)->format('Y-m-d');

            $matriculaspagas = [];
            $matriculasnpagas = [];
            $total = 0.00;

            $mensalidades = Mensalidade::all();
            $clientes = Cliente::all();
            $matriculas = Matricula::whereNull('deleted_at')->get();
            $planos = Plano::all();

            foreach ($matriculas as $matricula){

                $diamat = '01';
                $mesmat = substr($matricula->data, 5, 2);
                $anomat = substr($matricula->data, 0, 4);
                $datamat = $mesmat."-".$diamat."-".$anomat;
                $datamatricula = DateTime::createFromFormat('m-d-Y', $datamat)->format('Y-m-d');
                $contador = 0;

                if($datamatricula > $dataFiltro)
                {
                    $contador = $contador + 1;
                }
                else if($datamatricula <= $dataFiltro){
                    foreach($mensalidades as $mensalidade) {
                        if($matricula->id == $mensalidade->matricula_id and $mensalidade->datames == $datames) {
                            $contador = $contador + 1;
                        }
                    }
                }

                if($contador > 0){
                    $matriculaspagas  [] = $matricula;
                }
                else{
                    $matriculasnpagas  [] = $matricula;
                }
            }

            foreach ($matriculasnpagas as $matriculasnpaga){
                foreach ($planos as $plano){
                    if($plano->id == $matriculasnpaga->plano_id){
                        $total = $total + $plano->valor_plano;

                    }
                }
            }



            $pdf = PDF::loadView('Painel.Relatorios.clientesPDF',compact( 'title', 'clientes',
                'matriculasnpagas','datames','total'));

            return $pdf->setPaper('a4')->stream('clientesPDF.pdf');


        }else{
            return view('Painel.Usuarios.negado');
        }
    }


    public function avaliacoes()
    {
        $title = 'Painel de Histórico de Avaliações';
        $clientes = Cliente::all();
        return view('Painel.Relatorios.avaliacoes', compact('title','clientes'));

    }

    public function viewAvaliacoes($id)
    {
        $title = 'Histórico de Avalialções';
        $cliente = Cliente::find($id);
        if($cliente){

            $avaliacoes = Avaliacao::where('cliente_id', $cliente->id)->orderBy('data', 'asc')->get();
            return view('Painel.Relatorios.viewAvaliacoes', compact('title','cliente','avaliacoes'));

        }
        else{
            return redirect()->route("Painel.Avaliacoes.index")->with('errors', 'Busca Invalida');
        }
    }

    public function avaliacoesPDF($id)
    {
        $title = 'Histórico de Avalialções';
        $cliente = Cliente::find($id);
        if($cliente){

            $avaliacoes = Avaliacao::where('cliente_id', $cliente->id)->orderBy('data', 'asc')->get();

            $pdf = PDF::loadView('Painel.Relatorios.avaliacoesPDF',compact( 'title', 'cliente','avaliacoes'));

            return $pdf->setPaper('a4','landscape')->stream('avaliacoesPDF.pdf');

            return view('Painel.Relatorios.viewAvaliacoes', compact('title','cliente','avaliacoes'));

        }
        else{
            return redirect()->route("Painel.Avaliacoes.index")->with('errors', 'Busca Invalida');
        }

    }
}
