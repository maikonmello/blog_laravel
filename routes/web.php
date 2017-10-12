<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('contato', function () {
    return view('contato');
})->name('contato');

Route::get('servicos', function () {
    return view('servicos');
})->name('servicos');

Route::post('mensagens', function(){

	//Envio de email
	$data = request()->all();
	Mail::send("emails.mensagem", $data, function($message) use ($data){
		$message->from($data['email'], $data['name'])
				->to('maikonmelo10@gmail.com', 'Maikon')
				->subject($data['subject']);
	});

	//Resposta ao usuário
	return back()->with('flash', $data['name']. ', sua mensagem foi enviada com sucesso!');

})->name('mensagens');
