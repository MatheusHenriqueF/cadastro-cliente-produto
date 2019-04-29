<?php

Auth::routes();

Route::get('/', 'SiteController@pessoa');
Route::get('/index', 'SiteController@pessoa');

Route::get('/gerenciar-cliente', 'SiteController@pessoa');
Route::get('/gerenciar-produto', 'SiteController@produto');

Route::get('/cadastrarCliente', 'SiteController@cadastrarCliente');
Route::get('/cadastrarProduto', 'SiteController@cadastrarProduto');

Route::get('/cadastrarClienteApply', 'SiteController@cadastrarClienteApply');
Route::get('/cadastrarProdutoApply', 'SiteController@cadastrarProdutoApply');

Route::get('/buscaCliente', 'SiteController@buscaCliente');

Route::get('{id}/editarCliente', 'SiteController@editarCliente');
Route::get('{id}/editarProduto', 'SiteController@editarProduto');

Route::get('/updateCliente', 'SiteController@updateCliente');
Route::get('/updateProduto', 'SiteController@updateProduto');

Route::get('{id}/deletarCliente', 'SiteController@deletarCliente');
Route::get('{id}/deletarProduto', 'SiteController@deletarProduto');
