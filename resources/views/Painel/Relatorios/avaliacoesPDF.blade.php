<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Treinamento PDF</title>
    <h1 align="center" bold>SysForce - Histórico de Avaliações</h1>

    <h3>Nome: {{$cliente->nome_cliente}} | Telefone: {{$cliente->telefone_cliente}}</h3>
    <h3>Endereço: {{$cliente->endereco_cliente}} | Cidade: {{$cliente->cidade_cliente}} | {{$cliente->estado_cliente}}</h3>

    <div class="box-body">
        <table border="1">
            <thead>
            <tr>
                <th>Data de Avaliação</th>
                <th>Busto</th>
                <th>Braço Direito</th>
                <th>Braço Esquerdo</th>
                <th>Antebraço Direito</th>
                <th>Antebraço Esquerdo</th>
                <th>Peito</th>
                <th>Cintura</th>
                <th>Quadril</th>
                <th>Coxa Direita</th>
                <th>Coxa Esquerda</th>
                <th>Panturrilha Direita</th>
                <th>Panturrilha Esquerda</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>IMC</th>
            </tr>
            </thead>
            <tbody>

            @foreach($avaliacoes as $avaliacao)
                <tr>

                    <td>{{  date('d/m/Y H:i:s', strtotime($avaliacao->data)) }}</td>
                    <td>{{$avaliacao->busto}}</td>
                    <td>{{$avaliacao->bracoDireito}}</td>
                    <td>{{$avaliacao->bracoEsquerdo}}</td>
                    <td>{{$avaliacao->antebracoDireito}}</td>
                    <td>{{$avaliacao->antebracoEsquerdo}}</td>
                    <td>{{$avaliacao->peito}}</td>
                    <td>{{$avaliacao->cintura}}</td>
                    <td>{{$avaliacao->quadril}}</td>
                    <td>{{$avaliacao->coxaDireita}}</td>
                    <td>{{$avaliacao->coxaEsquerda}}</td>
                    <td>{{$avaliacao->panturrilhaDireita}}</td>
                    <td>{{$avaliacao->panturrilhaEsquerda}}</td>
                    <td>{{$avaliacao->altura}}</td>
                    <td>{{$avaliacao->peso}}</td>
                    <td>{{$avaliacao->imc}}</td>
                </tr>
            @endforeach

            </tbody>

        </table>
    </div>
</head>
<body>

</body>
</html>
