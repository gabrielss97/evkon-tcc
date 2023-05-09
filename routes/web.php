<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Auth\InscricaoAdmin;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroCliente;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\EstatisticasController;
use App\Http\Controllers\ExportarDadosController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\InscricaoColaborador;
use App\Http\Controllers\DenunciaAnuncioController;
use App\Http\Controllers\DenunciaComentarioController;
use App\Http\Controllers\PoliticaPrivacidadeController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TermosDeUsoController;

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

Route::get('/', [inicioController::class, 'index'])->name('inicio');

// Autenticação
Auth::routes(['register' => false, 'login' => false]);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('registro/cliente', [RegistroCliente::class, 'registro'])->name('registro.cliente');
Route::get('/auth/redirect/{provider}/{conta?}', [SocialiteController::class, 'authRedirect'])->name('socialite.redirect');
Route::get('/auth/callback/{provider}', [SocialiteController::class, 'authCallback'])->name('socialite.callbck');
// Inscrição colaborador
Route::get('/inscricao-para-ser-colaborador', [InscricaoColaborador::class, 'inscricaoColaborador'])->name('inscricao-colaborador');
Route::post('inscricao-colaborador', [InscricaoColaborador::class, 'inscricao'])->name('inscricao-colaborador-post');
// Inscrição admin
Route::post('inscricao-admin', [InscricaoAdmin::class, 'inscricao'])->name('inscricao-admin');

// Sobre
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
// Política de Privacidade
Route::get('/politica-de-privacidade', [PoliticaPrivacidadeController::class, 'index'])->name('politica-de-privacidade');
// Política de Privacidade
Route::get('/termos-de-uso', [TermosDeUsoController::class, 'index'])->name('termos-de-uso');
//Entrar em contato
Route::get('/contato', [ContatoController::class, 'entrarEmContato'])->name('contato');
Route::post('/contato/enviar', [ContatoController::class, 'contatoEnviar'])->name('contato.enviar');

// Painel de Controle
Route::get('/painel-de-controle', [HomeController::class, 'index'])->name('painel.home');
/* Lista de anúncios */
Route::get('/anuncios/meus-anuncios', [AnuncioController::class, 'meusAnuncios'])->name('anuncios.meus-anuncios');
Route::resource('/anuncios', AnuncioController::class);
// Comentários
Route::get('/comentarios', [ComentarioController::class, 'comentarios'])->name('painel.comentarios');
// Conta
Route::get('/conta', [UserController::class, 'conta'])->name('painel.conta');
Route::put('/conta/atualizar', [UserController::class, 'atualizar'])->name('painel.conta.atualizar');
Route::put('/conta/atualizar-foto', [UserController::class, 'atualizarFoto'])->name('painel.conta.atualizar-foto');
Route::put('/conta/atualizar-senha', [UserController::class, 'atualizarSenha'])->name('painel.conta.atualizar-senha');
// Colaboradores
Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores.index');
Route::get('/colaboradores/remover/{user}', [ColaboradorController::class, 'remover'])->name('colaboradores.remover');
Route::get('/colaboradores/ativar/{user}', [ColaboradorController::class, 'ativar'])->name('colaboradores.ativar');
Route::get('/colaboradores/desativar/{user}', [ColaboradorController::class, 'desativar'])->name('colaboradores.desativar');
Route::get('/colaboradores/{user}', [ColaboradorController::class, 'show'])->name('colaboradores.show');
// Clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/clientes/{user}', [ClienteController::class, 'show'])->name('clientes.visualizar-cliente');
Route::get('/clientes/ativar/{user}', [ClienteController::class, 'ativar'])->name('clientes.ativar');
Route::get('/clientes/desativar/{user}', [ClienteController::class, 'desativar'])->name('clientes.desativar');
Route::get('/clientes/remover/{user}', [ClienteController::class, 'remover'])->name('clientes.remover');
// Contatos
Route::get('/contatos', [ContatoController::class, 'contatos'])->name('contatos');
Route::get('/contatos/{contato}', [ContatoController::class, 'visualizarContato'])->name('contatos.visualizar-contato');
Route::get('/contatos/visualizado/{contato}', [ContatoController::class, 'addVisualizado'])->name('contatos.visualizado');
Route::get('/contatos/remover/{contato}', [ContatoController::class, 'destroy'])->name('contatos.remover');
// Estatísticas
Route::get('/estatisticas', [EstatisticasController::class, 'estatisticas'])->name('estatisticas');
Route::post('/estatisticas/pdf', [EstatisticasController::class, 'pdf'])->name('estatisticas.pdf');
// Denúncias de comentários
Route::get('/denuncias-de-comentarios', [DenunciaComentarioController::class, 'denunciasComentarios'])->name('denuncias-de-avaliacoes');
// Exportar dados
Route::get('/exportar', [ExportarDadosController::class, 'exportarDados'])->name('exportar');
Route::get('/exportar-colaboradores', [ExportarDadosController::class, 'exportColaboradores'])->name('exportar.colaboradores');
Route::get('/exportar-clientes', [ExportarDadosController::class, 'exportClientes'])->name('exportar.clientes');
Route::get('/exportar-anuncios', [ExportarDadosController::class, 'exportAnuncios'])->name('exportar.anuncios');
// Categorias
Route::resource('/categorias', CategoriaController::class);
// Comentários
Route::post('/add-comentario/{anuncio}', [ComentarioController::class, 'addComentario'])->name('add-comentario');
// Denúncias Comentários
Route::post('/denunciar-comentario/{comentario}', [DenunciaComentarioController::class, 'denunciarComentario'])->name('denunciar-comentario');
Route::get('/remover-comentario/{comentario}', [DenunciaComentarioController::class, 'removerComentario'])->name('remover-comentario');
Route::get('/nao-remover-comentario-denunciado/{denunciacomentario}/{comentario}', [DenunciaComentarioController::class, 'naoRemoverComentarioDenunciado'])->name('nao-remover-comentario-denunciado');
// Denúncias de anúncios
Route::post('/denunciar-anuncio/{anuncio}', [DenunciaAnuncioController::class, 'denunciarAnuncio'])->name('denunciar-anuncio');
Route::get('/remover-anuncio/{anuncio}', [DenunciaAnuncioController::class, 'removerAnuncio'])->name('remover-anuncio');
Route::get('/nao-remover-anuncio-denunciado/{denunciaanuncio}', [DenunciaAnuncioController::class, 'naoRemoverAnuncioDenunciado'])->name('nao-remover-anuncio-denunciado');
Route::get('/denuncias-de-anuncios', [DenunciaAnuncioController::class, 'denunciasAnuncios'])->name('denuncias-de-anuncios');
