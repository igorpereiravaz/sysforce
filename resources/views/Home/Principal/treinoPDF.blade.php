<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Treinamento PDF</title>
    <h1 align="center" bold>SysForce - Ficha de Treino</h1>

    <h3>Nome: {{$cliente->nome_cliente}} | Telefone: {{$cliente->telefone_cliente}}</h3>
    <h3>Endereço: {{$cliente->endereco_cliente}} | Cidade: {{$cliente->cidade_cliente}} | {{$cliente->estado_cliente}}</h3>

    <br><br>
    <h1 align="center">Nome do treino:{{$treinamento->nome}}</h1>

    <h2 align="center">Lista de Exercícios</h2>
    <fieldset>
    @foreach($exercicios as $exercicio)
        <li>{{$exercicio->nome_exercicio}}</li>
    @endforeach
    </fieldset>
</head>
<body>

</body>
</html>
