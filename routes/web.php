<?php

//======================================================================================================================
Route::group(['namespace' => 'Home'], function () {
    //Rota de Home Externo
    Route::get('/', 'HomeController@Show')->name('Home.Principal.Show');
    Route::get('/Cadastro', 'HomeController@create')->name('Home.Principal.create');
    Route::post('/Cadastro/store', 'HomeController@store')->name('Home.Principal.store');
    Route::post('/Treino/list', 'HomeController@list')->name('Home.Principal.list');
    Route::get('/Treino/view/{id}', 'HomeController@view')->name('Home.Principal.view');
    Route::get('/Treino/view/gerarPDF/{id}', 'HomeController@gerarPDF')->name('Home.Principal.gerarPDF');
    Route::get('/Treino', 'HomeController@treino')->name('Home.Principal.treino');
});


//======================================================================================================================
//Rotas de autentificação geradas automáticamente
Auth::routes();

Route::get('/Painel/Usuarios/create', 'Usuarios\UsuariosController@create')->name('Painel.Usuarios.create');

//======================================================================================================================
Route::group(['namespace' => 'Painel'], function (){

    //Painel de Controle
    Route::get('/Painel', 'PainelController@Show')->name('Painel.Principal.Show');

    //Usuários Rota Index de Usuários --------------------------------------------------------------------------------
    Route::get('/Painel/Usuarios', 'Usuarios\UsuariosController@index')->name('Painel.Usuarios.index');
    //Criação de Usuário
    Route::get('/Painel/Usuarios/create', 'Usuarios\UsuariosController@create')->name('Painel.Usuarios.create');
    //Salvando novo usuário
    Route::post('/Painel/Usuarios/store', 'Usuarios\UsuariosController@store')->name('Painel.Usuarios.store');
    //Editando usuario
    Route::get('/Painel/Usuarios/edit/{id}', 'Usuarios\UsuariosController@edit')->name('Painel.Usuarios.edit');
    //Salvando alterações de usuário
    Route::post('/Painel/Usuarios/update', 'Usuarios\UsuariosController@update')->name('Painel.Usuarios.update');
    //Excluindo usuário
    Route::get('/Painel/Usuarios/delete/{id}', 'Usuarios\UsuariosController@destroy')->name('Painel.Usuarios.destroy');

    //Rota Index de Planos
    Route::get('/Painel/Planos', 'Planos\PlanosController@index')->name('Painel.Planos.index');
    //Criação de Plano
    Route::get('/Painel/Planos/create', 'Planos\PlanosController@create')->name('Painel.Planos.create');
    //Salvando novo usuário
    Route::post('/Painel/Planos/store', 'Planos\PlanosController@store')->name('Painel.Planos.store');
    //Editando Plano
    Route::get('/Painel/Planos/edit/{id}', 'Planos\PlanosController@edit')->name('Painel.Planos.edit');
    //Salvando alterações de plano
    Route::post('/Painel/Planos/update', 'Planos\PlanosController@update')->name('Painel.Planos.update');
    //Excluindo plano
    Route::get('/Painel/Planos/delete/{id}', 'Planos\PlanosController@destroy')->name('Painel.Planos.destroy');

    Route::get('/Painel/Planos/confirmDestroy/{id}', 'Planos\PlanosController@confirmDestroy')->name('Painel.Planos.confirmDestroy');


    //Rota Index de Exercicios
    Route::get('/Painel/Exercicios', 'Exercicios\ExerciciosController@index')->name('Painel.Exercicios.index');
    //Criação de Exercicio
    Route::get('/Painel/Exercicios/create', 'Exercicios\ExerciciosController@create')->name('Painel.Exercicios.create');
    //Salvando novo Exercicio
    Route::post('/Painel/Exercicios/store', 'Exercicios\ExerciciosController@store')->name('Painel.Exercicios.store');
    //Editando Exercicio
    Route::get('/Painel/Exercicios/edit/{id}', 'Exercicios\ExerciciosController@edit')->name('Painel.Exercicios.edit');
    //Salvando alterações de Exercicio
    Route::post('/Painel/Exercicios/update', 'Exercicios\ExerciciosController@update')->name('Painel.Exercicios.update');
    //Excluindo Exercicio
    Route::get('/Painel/Exercicios/delete/{id}', 'Exercicios\ExerciciosController@destroy')->name('Painel.Exercicios.destroy');

    //Rota Index de Turmas
    Route::get('/Painel/Turmas', 'Turmas\TurmasController@index')->name('Painel.Turmas.index');
    //Criação de Turma
    Route::get('/Painel/Turmas/create', 'Turmas\TurmasController@create')->name('Painel.Turmas.create');
    //Salvando novo Turma
    Route::post('/Painel/Turmas/store', 'Turmas\TurmasController@store')->name('Painel.Turmas.store');
    //Editando Turma
    Route::get('/Painel/Turmas/edit/{id}', 'Turmas\TurmasController@edit')->name('Painel.Turmas.edit');
    //Salvando alterações de Turma
    Route::post('/Painel/Turmas/update', 'Turmas\TurmasController@update')->name('Painel.Turmas.update');
    //Excluindo Turma
    Route::get('/Painel/Turmas/delete/{id}', 'Turmas\TurmasController@destroy')->name('Painel.Turmas.destroy');

    Route::get('/Painel/TurmasPlano/confirmDestroy/{id}', 'Turmas\TurmasController@confirmDestroy')->name('Painel.Turmas.confirmDestroy');


    //Rota Index de Clientes
    Route::get('/Painel/Clientes', 'Clientes\ClientesController@index')->name('Painel.Clientes.index');
    //Criação de Cliente
    Route::get('/Painel/Clientes/create', 'Clientes\ClientesController@create')->name('Painel.Clientes.create');
    //Salvando novo Cliente
    Route::post('/Painel/Clientes/store', 'Clientes\ClientesController@store')->name('Painel.Clientes.store');
    //Editando Cliente
    Route::get('/Painel/Clientes/edit/{id}', 'Clientes\ClientesController@edit')->name('Painel.Clientes.edit');
    //Salvando alterações de Cliente
    Route::post('/Painel/Clientes/update', 'Clientes\ClientesController@update')->name('Painel.Clientes.update');
    //Excluindo Cliente
    Route::get('/Painel/Clientes/delete/{id}', 'Clientes\ClientesController@destroy')->name('Painel.Clientes.destroy');

    Route::get('/Painel/Clientes/confirmDestroy/{id}', 'Clientes\ClientesController@confirmDestroy')->name('Painel.Clientes.confirmDestroy');


    //Rota Index de Matriculados
    Route::get('/Painel/Matriculas', 'Matriculas\MatriculasController@index')->name('Painel.Matriculas.index');
    Route::get('/Painel/Matriculas/create', 'Matriculas\MatriculasController@create')->name('Painel.Matriculas.create');
    Route::get('/Painel/Matriculas/createturma/{id}', 'Matriculas\MatriculasController@createturma')->name('Painel.Matriculas.createturma');
    Route::post('/Painel/Matriculas/store', 'Matriculas\MatriculasController@store')->name('Painel.Matriculas.store');
    Route::post('/Painel/Matriculas/storeturma', 'Matriculas\MatriculasController@storeturma')->name('Painel.Matriculas.storeturma');
    Route::get('/Painel/Matriculas/edit/{id}', 'Matriculas\MatriculasController@edit')->name('Painel.Matriculas.edit');
    Route::get('/Painel/Matriculas/finish/{id}', 'Matriculas\MatriculasController@finish')->name('Painel.Matriculas.finish');
    Route::post('/Painel/Matriculas/checkout', 'Matriculas\MatriculasController@checkout')->name('Painel.Matriculas.checkout');
    //Salvando alterações de Matriculas
    Route::post('/Painel/Matriculas/update', 'Matriculas\MatriculasController@update')->name('Painel.Matriculas.update');
    //Excluindo Matriculas
    Route::get('/Painel/Matriculas/delete/{id}', 'Matriculas\MatriculasController@destroy')->name('Painel.Matriculas.destroy');
    Route::get('/Painel/Matriculas/forceDelete/{id}', 'Matriculas\MatriculasController@forceDestroy')->name('Painel.Matriculas.forceDestroy');
    Route::get('/Painel/Matriculas/confirmDestroy/{id}', 'Matriculas\MatriculasController@confirmDestroy')->name('Painel.Matriculas.confirmDestroy');

    //Rotas de Mensalidades
    Route::get('Painel/Mensalidades', 'Mensalidades\MensalidadesController@index')->name('Painel.Mensalidades.index');
    Route::get('/Painel/Mensalidades/show/{id}', 'Mensalidades\MensalidadesController@show')->name('Painel.Mensalidades.show');
    Route::get('/Painel/Mensalidades/delete/{id}', 'Mensalidades\MensalidadesController@destroy')->name('Painel.Mensalidades.destroy');
    Route::get('/Painel/Mensalidades/payment/{id}', 'Mensalidades\MensalidadesController@payment')->name('Painel.Mensalidades.payment');
    Route::post('/Painel/Mensalidades/pay', 'Mensalidades\MensalidadesController@pay')->name('Painel.Mensalidades.pay');
    Route::get('/Painel/Mensalidades/payment/getMonth/{matricula}/{mesdata}', 'Mensalidades\MensalidadesController@getMonth')->name('Painel.Mensalidades.getMonth');

    Route::get('Painel/Avaliacoes/', 'Avaliacoes\AvaliacoesController@index')->name('Painel.Avaliacoes.index');
    Route::get('/Painel/Avaliacoes/show/{id}', 'Avaliacoes\AvaliacoesController@show')->name('Painel.Avaliacoes.show');
    Route::get('/Painel/Avaliacoes/new/{id}', 'Avaliacoes\AvaliacoesController@new')->name('Painel.Avaliacoes.new');
    Route::get('/Painel/Avaliacoes/delete/{id}', 'Avaliacoes\AvaliacoesController@destroy')->name('Painel.Avaliacoes.destroy');
    Route::get('/Painel/Avaliacoes/view/{id}', 'Avaliacoes\AvaliacoesController@view')->name('Painel.Avaliacoes.view');
    Route::post('/Painel/Avaliacoes/store', 'Avaliacoes\AvaliacoesController@store')->name('Painel.Avaliacoes.store');
    Route::get('/Painel/Avaliacoes/edit/{id}', 'Avaliacoes\AvaliacoesController@edit')->name('Painel.Avaliacoes.edit');
    Route::post('/Painel/Avaliacoes/update', 'Avaliacoes\AvaliacoesController@update')->name('Painel.Avaliacoes.update');


    Route::get('Painel/Treinosolos/', 'Treinosolos\TreinosolosController@index')->name('Painel.Treinosolos.index');
    Route::get('/Painel/Treinosolos/show/{id}', 'Treinosolos\TreinosolosController@show')->name('Painel.Treinosolos.show');
    Route::get('/Painel/Treinosolos/view/{id}', 'Treinosolos\TreinosolosController@view')->name('Painel.Treinosolos.view');
    Route::get('/Painel.Treinosolos.create/{id}', 'Treinosolos\TreinosolosController@create')->name('Painel.Treinosolos.create');
    Route::post('/Painel/Treinosolos/store', 'Treinosolos\TreinosolosController@store')->name('Painel.Treinosolos.store');
    Route::get('/Painel/Treinosolos/edit/{id}', 'Treinosolos\TreinosolosController@edit')->name('Painel.Treinosolos.edit');
    Route::get('/Painel/Treinosolos/finish/{id}', 'Treinosolos\TreinosolosController@finish')->name('Painel.Treinosolos.finish');
    Route::post('/Painel/Treinosolos/update', 'Treinosolos\TreinosolosController@update')->name('Painel.Treinosolos.update');
    Route::get('/Painel/Treinosolos/delete/{id}', 'Treinosolos\TreinosolosController@destroy')->name('Painel.Treinosolos.destroy');

    Route::get('Painel/Treinoturmas/', 'Treinoturmas\TreinoturmasController@index')->name('Painel.Treinoturmas.index');
    Route::get('/Painel/Treinoturmas/show/{id}', 'Treinoturmas\TreinoturmasController@show')->name('Painel.Treinoturmas.show');
    Route::get('/Painel/Treinoturmas/view/{id}', 'Treinoturmas\TreinoturmasController@view')->name('Painel.Treinoturmas.view');
    Route::get('/Painel.Treinoturmas.create/{id}', 'Treinoturmas\TreinoturmasController@create')->name('Painel.Treinoturmas.create');
    Route::post('/Painel/Treinoturmas/store', 'Treinoturmas\TreinoturmasController@store')->name('Painel.Treinoturmas.store');
    Route::get('/Painel/Treinoturmas/edit/{id}', 'Treinoturmas\TreinoturmasController@edit')->name('Painel.Treinoturmas.edit');
    Route::get('/Painel/Treinoturmas/finish/{id}', 'Treinoturmas\TreinoturmasController@finish')->name('Painel.Treinoturmas.finish');
    Route::post('/Painel/Treinoturmas/update', 'Treinoturmas\TreinoturmasController@update')->name('Painel.Treinoturmas.update');
    Route::get('/Painel/Treinoturmas/delete/{id}', 'Treinoturmas\TreinoturmasController@destroy')->name('Painel.Treinoturmas.destroy');

    Route::get('Painel/Relatorios/select', 'Relatorios\RelatoriosController@choseLucro')->name('Painel.Relatorios.choseLucro');
    Route::post('/Painel/Relatorios/gain', 'Relatorios\RelatoriosController@viewLucro')->name('Painel.Relatorios.viewLucro');
    Route::get('/Painel/Relatorios/gain/gainPDF/{datames}', 'Relatorios\RelatoriosController@lucroPDF')->name('Painel.Relatorios.lucroPDF');

    Route::get('Painel/Relatorios/choose', 'Relatorios\RelatoriosController@choseCliente')->name('Painel.Relatorios.choseClientes');
    Route::post('/Painel/Relatorios/clientes', 'Relatorios\RelatoriosController@viewClientes')->name('Painel.Relatorios.viewClientes');
    Route::get('/Painel/Relatorios/clientes/clientesPDF/{datames}', 'Relatorios\RelatoriosController@clientesPDF')->name('Painel.Relatorios.clientesPDF');

    Route::get('Painel/Relatorios/avaliacoes', 'Relatorios\RelatoriosController@avaliacoes')->name('Painel.Relatorios.avaliacoes');
    Route::get('/Painel/Relatorios/avaliacoes/view/{id}', 'Relatorios\RelatoriosController@viewAvaliacoes')->name('Painel.Relatorios.viewAvaliacoes');
    Route::get('/Painel/Relatorios/avaliacoes/avaliacoesPDF/{id}', 'Relatorios\RelatoriosController@avaliacoesPDF')->name('Painel.Relatorios.avaliacoesPDF');


});
