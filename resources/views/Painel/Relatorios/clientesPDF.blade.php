<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Treinamento PDF</title>
    <h1 align="center" bold>SysForce - Relatório de Clientes</h1>

    <h3 align="center">Inadimplentes em {{$datames}}</h3>
    <h1>Total: R$ {{$total}},00</h1>

    <div class="box-body">
        <table border="1" align="center">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>

            @foreach($matriculasnpagas as $matriculasnpaga)
                <tr>
                    @php
                        $plano = $matriculasnpaga->plano()->get()->first();
                    @endphp
                    @foreach($clientes as $cliente)
                        @if($cliente->id == $matriculasnpaga->cliente_id)
                            <td>{{ $cliente->nome_cliente }}</td>
                            <td>{{ $cliente->telefone_cliente }}</td>
                            <td>{{ $cliente->endereco_cliente }}</td>
                            <td>{{ $cliente->cidade_cliente }}</td>
                        @endif
                    @endforeach
                    <td>{{ $plano->valor_plano }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</head>
<body>

</body>
</html>
