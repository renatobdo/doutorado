<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BuscarCasosDengueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Aulas 1 a 8
/*Route::get('/', function () {
    $nome = "Renato";
    $idade = 20;
    $arr = [1,2,3,4,5];
    $nomes = ["Renato", "Paula","Laura", "Helena"];



    return view('welcome', 
        ['nome'=> $nome, 
        'idade'=> $idade, 
        'profissao'=>'professor',
        'arr'=>$arr,
        'nomes'=>$nomes
    ]);
});*/

//Aula 9 - vídeo 9 - https://www.youtube.com/watch?v=O0enF2nVBNE&list=PLnDvRpP8BnewYKI1n2chQrrR4EYiJKbUG&index=9




Route::get('/', [EventController::class,'index']);
Route::get('/events/create', [EventController::class,'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class,'show']);
Route::post('/events', [EventController::class,'store']);
Route::delete('/events/{id}', [EventController::class,'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class,'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class,'update'])->middleware('auth');
Route::post('/events/join/{id}', [EventController::class,'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class,'leaveEvent'])->middleware('auth');
Route::get('/buscarCep/{cep}', [EventController::class, 'getAddressByCEP']);
Route::get('/buscarDengue/{cep}', [EventController::class, 'buscarCasosDengue']);
//Route::get('catalogo/{termo}', [EventController::class, 'buscarCatalogo']);
//Route::get('/catalogo/{termo}', [EventController::class, 'buscarCatalogoAll']);
//Route::get('catalogo', [EventController::class, 'buscarCatalogoAll']);
Route::get('/editar-termo/{termo}', [EventController::class, 'editarTermo']);
Route::get('/metricaseindicadores',  function () {
    return view('metricaseindicadores');
});
Route::get('/repositorios',  function () {
    return view('repositorios');
});
Route::get('/gestao',  function () {
    return view('gestao');
});
Route::get('/tf',  function () {
    return view('tf');
});
Route::get('/campanhas',  function () {
    return view('campanhas');
});
Route::get('catalogo', [EventController::class, 'showCatalogo']);
Route::get('dashboard',[EventController::class, 'dashboard'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/produtos', function () {
    return view('products');
});
Route::get('/jogo', function () {
    return view('jogo');
});


/*
Route::get('/paz', function () {
    return view('paz');
});
*/
/*
Route::get('/paz', function () {
    $data = [
        'message' => 'Olá, bem-vindo ao meu site!'
    ];
    return view('paz', $data);
});
*/
Route::get('/paz', function () {
    $messages = [
        "paz no Oriente Médio",
        "A paz é a única forma de nos sentirmos realmente humanos",
        "Não existe um caminho para a paz. A paz é o caminho"
    ];
    $isUserLoggedIn = false;
    $randomMessage = $messages[array_rand($messages)];
    return view('paz', ['message' => $randomMessage, 
                        'usuario'=>$isUserLoggedIn]);
});

Route::post('/cadastro', 'CadastroController@submitForm');
//php artisan make:controller ContactController
//Isso criará um arquivo chamado ContactController.php na pasta app/Http/Controllers.


Route::get('/produtos2', 'EventController@index');
Route::get('/produtos2/{id}', 'EventController@show');

//testes
/*Route::get('/', function () {
    return view('inicio');
});
*/

Route::get('/teste', function () {
    $nome = "Renato";
    $idade = 20;
    $arr = [1,2,3,4,5];
    $nomes = ["Renato", "Paula","Laura", "Helena"];



    return view('welcome', 
        ['nome'=> $nome, 
        'idade'=> $idade, 
        'profissao'=>'professor',
        'arr'=>$arr,
        'nomes'=>$nomes
    ]);

});
Route::get('/produtos/{id}', function($id){
    return view('layouts.product',['id' => $id]);
});
Route::get('/produtos_teste/{id?}', function($id = null){
    return view('layouts.product',['id' => $id]);
});
Route::get('/produtos', function(){

    $busca = request('search');
    return view('products',['busca'=>$busca]);
});

Route::get('/inicio', function(){

   
    return view('inicio',[EventController::class,'index']);
});
/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
