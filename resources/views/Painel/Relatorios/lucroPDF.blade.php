<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Treinamento PDF</title>
    <h1 align="center" bold>SysForce - Relatório de lucro</h1>

    <h3 align="center">Lucro em {{$datames}} : R${{$lucro}},00</h3>

    <div class="box-body">
        <table border="1" align="center">

            <tr>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Mês Referência</th>
                <th>Data de Pagamento</th>
            </tr>
            <tbody>

            @foreach($pagamentos as $pagamento)
                @foreach($matriculaspagos as $matriculaspago)
                    @if($pagamento->matricula_id == $matriculaspago->id)
                        @php
                            $clientepago = $matriculaspago->cliente()->get()->first();
                        @endphp
                        <tr>
                            <td>{{ $clientepago->nome_cliente }}</td>
                            <td>R${{ str_replace(".",",",$pagamento->valor) }}</td>
                            <td>{{ $pagamento->datames }}</td>
                            <td>{{date('d/m/Y H:i:s', strtotime($pagamento->datapagamento)) }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach

            </tbody>
        </table>
    </div>
</head>
<body>

</body>
</html>
